<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FunilController extends Controller
{
    public function moverCard(Request $request)
    {
        $cardId = $request->input('card_id');
        $estadoAtual = $request->input('estado_atual');
        $estadoDestino = $request->input('estado_destino');

        // Validar os dados

        $card = Card::find($cardId);

        if (!$card) {
            return response()->json([
                'success' => false,
                'message' => 'Card não encontrado.'
            ]);
        }

        if ($card->estado != $estadoAtual) {
            return response()->json([
                'success' => false,
                'message' => 'O estado atual do card não corresponde ao informado.'
            ]);
        }

        // Atualizar o estado do card

        $card->estado = $estadoDestino;
        $card->save();

        return response()->json([
            'success' => true,
            'message' => 'Card movido com sucesso.'
        ]);
    }
}
