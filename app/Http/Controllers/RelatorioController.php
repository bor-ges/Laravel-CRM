<?php

namespace App\Http\Controllers;

use App\Models\Relatorio;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Http\Controllers\ObraController;
use App\Models\Activity;
use App\Models\Image;
use App\Models\Labor;
use App\Models\Occurrence;
use App\Models\RecivedMart;
use App\Models\ReportEquip;
use App\Models\ReportVideo;
use App\Models\UsedMart;
use App\Models\Attachment;
use App\Models\Comment;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade\Pdf;
use DateTime;

class RelatorioController extends Controller
{

    public function index()
    {

        $obrasClass = new ObraController;
        $obras = $obrasClass->getProjectsaData();
        $reports = DB::table('relatorios')->get();
        return view('gestao-oportunidade.relatorios', compact('obras', 'reports'));
    }

    public function getReportById(string|int $id)
    {
        $obrasClass = new ObraController;
        $maoDeObraClass = new MaoDeObraController;
        $equipClass = new EquipamentoController;

        $reports = DB::table('relatorios')->where('id', $id)->get();
        $labors = DB::table('labors')->where('report', $id)->get();
        $equipaments = DB::table('report_equips')->where('report', $id)->get();
        $activities = DB::table('activities')->where('report', $id)->get();
        $occurrences = DB::table('occurrences')->where('report', $id)->get();
        $recived_mats = DB::table('recived_mats')->where('report', $id)->get();
        $used_mats = DB::table('used_mats')->where('report', $id)->get();
        $comments = DB::table('comments')->where('report', $id)->get();
        $images = DB::table('images')->where('report', $id)->get();
        $videos = DB::table('report_videos')->where('report', $id)->get();
        $attachments = DB::table('report_attachments')->where('report', $id)->get();
        $search = $reports[0]->related_project;
        $obras = $obrasClass->getProjectsaDataBySearch($search);

        return view('gestao-oportunidade.viewreport', compact(
            'reports', 
            'obras', 
            'labors', 
            'equipaments', 
            'activities', 
            'occurrences', 
            'recived_mats', 
            'used_mats', 
            'comments', 
            'images', 
            'videos', 
            'attachments'
        ));
    }

    public function getDiferenceBetweenTime($entry_time, $dep_time, $intv_entry, $intv_dep)
    {
        $entry = DateTime::createFromFormat('H:i', $entry_time);
        $end = DateTime::createFromFormat('H:i', $dep_time);

        $entry_interv = DateTime::createFromFormat('H:i', $intv_entry);
        $end_interv = DateTime::createFromFormat('H:i', $intv_dep);

        $interv_diff = $entry_interv->diff($end_interv);
        $interv_diff = intval($interv_diff->format('%H'));

        $timeDif = $entry->diff($end);
        $timeDif = intval($timeDif->format('%H:%I'));

        $workTime = $timeDif - $interv_diff;

        $workTime = $workTime.'h';

        return $workTime;
    }

    public function renderReportAsPDF(Request $req, string|int $id)
    {

        $obrasClass = new ObraController;
        
        $reports = DB::table('relatorios')->where('id', $id)->get();
        $labors = DB::table('labors')->where('report', $id)->get();
        $equipaments = DB::table('report_equips')->where('report', $id)->get();
        $activities = DB::table('activities')->where('report', $id)->get();
        $occurrences = DB::table('occurrences')->where('report', $id)->get();
        $recived_mats = DB::table('recived_mats')->where('report', $id)->get();
        $used_mats = DB::table('used_mats')->where('report', $id)->get();
        $comments = DB::table('comments')->where('report', $id)->get();
        $images = DB::table('images')->where('report', $id)->get();
        $videos = DB::table('report_videos')->where('report', $id)->get();
        $attachments = DB::table('report_attachments')->where('report', $id)->get();
        
        $search = $reports[0]->related_project;
        $obras = $obrasClass->getProjectsaDataBySearch($search);

        $workTime = self::getDiferenceBetweenTime($reports[0]->entry_time, $reports[0]->dep_time, $reports[0]->intv_entry, $reports[0]->intv_dep);

        $data = [
            'reports' => $reports, 
            'obras' => $obras,
            'labors' => $labors, 
            'equipaments' => $equipaments, 
            'activities' => $activities, 
            'occurrences' => $occurrences, 
            'recived_mats' => $recived_mats, 
            'used_mats' => $used_mats, 
            'comments' => $comments, 
            'images' => $images, 
            'videos' => $videos, 
            'attachments' => $attachments,
            'workedTime' => $workTime
        ];

        $pdf = Pdf::loadView('gestao-oportunidade.loadpdf', $data)->setPaper('a4', 'landscape');

        return $pdf->stream(date(time()).'.pdf');

    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'report_date' => 'required|max:255',
            'related_project' => 'required|max:255'
        ]);

        $report = new Relatorio();

        $report->report_date = Carbon::parse($validated['report_date'])->format('d/m/Y');
        $report->related_project = $validated['related_project'];
        $report->entry_time = '';
        $report->dep_time = '';
        $report->intv_entry = '';
        $report->intv_dep = '';
        $report->report_status = 'Preenchendo Relatório';

        $report->save();

        $editRoute = '/diario-de-obras/relatorios/fill/' . DB::getPdo()->lastInsertId();

        return redirect($editRoute);
    }

    public function toFillInReport(Relatorio $relatorio, string|int $id)
    {

        $obrasClass = new ObraController;
        $maoDeObraClass = new MaoDeObraController;
        $equipClass = new EquipamentoController;

        $reports = DB::table('relatorios')->where('id', $id)->get();
        $search = $reports[0]->related_project;
        $obras = $obrasClass->getProjectsaDataBySearch($search);
        $maoDeObra = $maoDeObraClass->getMembers();
        $equipaments = $equipClass->getEquip();
        $grupos = $maoDeObraClass->getGroups();

        return view('gestao-oportunidade.edit-report', compact('reports', 'obras', 'maoDeObra', 'equipaments', 'grupos'));
    }


    public function createReport(Request $request, Relatorio $relatorio, Image $image, Labor $labor, ReportEquip $reportEquip, Activity $activity, Occurrence $occurrence, RecivedMart $recivedMat, UsedMart $usedMat, Comment $comment, ReportVideo $reportVideo, Attachment $attachment)
    {

        // dd($request->all()); 
        $report_id = $request->id;

        $report = DB::table('relatorios')->where('id', $report_id)->update([
            'entry_time' => $request->entry_time,
            'dep_time' => $request->dep_time,
            'intv_dep' => $request->intv_dep,
            'intv_entry' => $request->intv_entry
        ]);

        if (true) {

            if ($request->tecnicos) {

                for ($i = 0; $i < count($request->tecnicos); $i++) {

                    $maoDeObra = $labor->create([
                        'labor_name' => $request->tecnicos[$i],
                        'report' => $report_id
                    ]);
                }
            }

            sleep(1);

            if ($request->equipaments) {

                for ($i = 0; $i < count($request->equipaments); $i++) {

                    $equip = $reportEquip->create([
                        'equip_name' => $request->equipaments[$i],
                        'report' => $report_id
                    ]);
                }
            }

            sleep(1);

            if ($request->activities) {

                for ($i = 0; $i < count($request->activities); $i++) {

                    $act = $activity->create([
                        'activitie' => $request->activities[$i],
                        'report' => $report_id,
                        'status' => ''
                    ]);
                }
            }

            sleep(1);

            if ($request->occurrences) {

                for ($i = 0; $i < count($request->occurrences); $i++) {

                    $occ = $occurrence->create([
                        'occurrence' => $request->occurrences[$i],
                        'report' => $report_id
                    ]);
                }
            }

            sleep(1);

            if ($request->received_mats) {

                for ($i = 0; $i < count($request->received_mats); $i++) {

                    $recMats = $recivedMat->create([
                        'recived_mat_name' => $request->received_mats[$i],
                        'report' => $report_id
                    ]);
                }
            }

            sleep(1);

            if ($request->used_mats) {

                for ($i = 0; $i < count($request->used_mats); $i++) {

                    $usMats = $usedMat->create([
                        'used_mat_name' => $request->used_mats[$i],
                        'report' => $report_id
                    ]);
                }
            }

            sleep(1);

            if ($request->comments) {

                $com = $comment->create([
                    'comment' => $request->comments,
                    'report' => $report_id
                ]);
            }

            sleep(1);

            if ($request->report_imgs) {

                for ($i = 0; $i < count($request->report_imgs); $i++) {

                    $img = $request->report_imgs[$i];
                    $img_name = md5(rand(1, 1000000)) . '.' . $img->getClientOriginalExtension();
                    $img->move('assets/img/obras/relatorios', $img_name);

                    $imgs = $image->create([
                        'img_name' => $img_name,
                        'report' => $report_id
                    ]);
                }
            }

            sleep(1);

            if ($request->report_videos) {

                for ($i = 0; $i < count($request->report_videos); $i++) {

                    $video = $request->report_videos[$i];
                    $video_name = md5(rand(1, 1000000)) . '.' . $video->getClientOriginalExtension();
                    $video->move('assets/img/obras/relatorios/videos', $video_name);

                    $videos = $reportVideo->create([
                        'video_name' => $img_name,
                        'report' => $report_id
                    ]);
                }
            }

            sleep(1);

            if ($request->attachments) {

                for ($i = 0; $i < count($request->attachments); $i++) {

                    $att = $request->attachments[$i];
                    $att_name = md5(rand(1, 1000000)) . '.' . $att->getClientOriginalExtension();
                    $att->move('assets/img/obras/relatorios/anexos', $att_name);

                    $attach = $attachment->create([
                        'attachments_name' => $img_name,
                        'report' => $report_id
                    ]);
                }
            }
            
            return redirect('/diario-de-obras/relatorios');
        }
    }

    public function getReportDataByIdToEdit(string|int $id)
    {

        $obrasClass = new ObraController;
        
        $reports = DB::table('relatorios')->where('id', $id)->get();
        $labors = DB::table('labors')->where('report', $id)->get();
        $equipaments = DB::table('report_equips')->where('report', $id)->get();
        $activities = DB::table('activities')->where('report', $id)->get();
        $occurrences = DB::table('occurrences')->where('report', $id)->get();
        $recived_mats = DB::table('recived_mats')->where('report', $id)->get();
        $used_mats = DB::table('used_mats')->where('report', $id)->get();
        $comments = DB::table('comments')->where('report', $id)->get();
        $images = DB::table('images')->where('report', $id)->get();
        $videos = DB::table('report_videos')->where('report', $id)->get();
        $attachments = DB::table('report_attachments')->where('report', $id)->get();
        
        $search = $reports[0]->related_project;
        $obras = $obrasClass->getProjectsaDataBySearch($search);

        $data = [
            'reports' => $reports, 
            'obras' => $obras,
            'labors' => $labors, 
            'equipaments' => $equipaments, 
            'activities' => $activities, 
            'occurrences' => $occurrences, 
            'recived_mats' => $recived_mats, 
            'used_mats' => $used_mats, 
            'comments' => $comments, 
            'images' => $images, 
            'videos' => $videos, 
            'attachments' => $attachments
        ];

        return view('gestao-oportunidade.edit-report', $data);
    }

    public function deleteReport(string $id)
    {

        $report = Relatorio::find($id);

        if (!$report) {
            return abort(404);
        }

        $report->delete();


        return redirect('/diario-de-obras/relatorios');
    }
}
