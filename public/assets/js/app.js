
async function createActivity() {
    var act = document.querySelector('.act');

    if (act.value != '') {

        var activities = document.querySelector('.activities');
        var element = document.createElement('div');
        element.innerHTML = `<div class='form-check'> 
            <input class='form-check-input' name='activities[]' type='checkbox' value='${act.value}' id='flexCheckDefault' checked>
            <label class='form-check-label' for='flexCheckDefault'>${act.value}</label>
        </div>`
        act.value = '';

        await activities.appendChild(element);

        

    } else {

        alert('Não é possível adiconar uma atividade em branco');
    }

}

async function createourrences()
{
    var occ = document.querySelector('.occ');

    if (occ.value != '') {

        var occurrences = document.querySelector('.occurrences');
        var element = document.createElement('div');
        element.innerHTML = `<div class='form-check'> 
            <input class='form-check-input' name='occurrences[]' type='checkbox' value='${occ.value}' id='flexCheckDefault' checked>
            <label class='form-check-label' for='flexCheckDefault'>${occ.value}</label>
        </div>`
        occ.value = '';

        await occurrences.appendChild(element);

    } else {

        alert('Não é possível adiconar uma ocorrência em branco');
    }
}

async function createRecivedMats()
{
    var recMats = document.querySelector('.recMats');

    if (recMats.value != '') {

        var recivedMats = document.querySelector('.recivedMats');
        var element = document.createElement('div');
        element.innerHTML = `<div class='form-check'> 
            <input class='form-check-input' name='received_mats[]' type='checkbox' value='${recMats.value}' id='flexCheckDefault' checked>
            <label class='form-check-label' for='flexCheckDefault'>${recMats.value}</label>
        </div>`
        recMats.value = '';

        await recivedMats.appendChild(element);

    } else {

        alert('Não é possível adiconar itens em em branco');
    }
}

async function createUsedMats()
{
    var usMats = document.querySelector('.usMats');

    if (usMats.value != '') {

        var usedMats = document.querySelector('.usedMats');
        var element = document.createElement('div');
        element.innerHTML = `<div class='form-check'> 
            <input class='form-check-input' name='used_mats[]' type='checkbox' value='${usMats.value}' id='flexCheckDefault' checked>
            <label class='form-check-label' for='flexCheckDefault'>${usMats.value}</label>
        </div>`
        usMats.value = '';

        await usedMats.appendChild(element);

    } else {

        alert('Não é possível adiconar itens em branco');
    }
}

function showLoadingSpinner()
{
    let spinner = document.querySelector('.bg-spinner');
    spinner.style.display = 'flex';
}