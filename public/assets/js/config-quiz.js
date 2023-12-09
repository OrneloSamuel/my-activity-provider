/*TESTAR O FUNCIONAMENTO DOS PARÂMETROS DE CONFIGURAÇÃO*/

var resume = '';
var instruction = '';
var matter = '';

const resumeItem = document.getElementById('resume')
resumeItem.addEventListener('change', function () {
    resume = document.getElementById('resume').value;
});

const instructionItem = document.getElementById('instruction')
instructionItem.addEventListener('change', function () {
    instruction = document.getElementById('instruction').value;
});

const matterItem = document.getElementById('matter')
matterItem.addEventListener('change', function () {
    matter = document.getElementById('matter').value;

    createJSON(resume, instruction, matter)
});

//Testar envio do JSON
function createJSON(resume, instruction, matter) {
    var obj = new Object();
    obj.resume = resume;
    obj.instruction = instruction;
    obj.matter = matter;
    myJSON = JSON.stringify(obj);
    console.log(myJSON);
    const options = {
        method: 'POST',
        headers: {
            'Content-type': 'application/json'
        },
        mode: 'cors',
        body: myJSON
    };
    fetch('https://my-activity-provider-c21fad9b3b83.herokuapp.com/api/test', options)
        .then(function (response) {
            return response.text();
        })
        .then(function (text) {
            console.log('Request successful:', text);
        })
        .catch(function (error) {
            log('Request failed', error)
        });
}

//Testar recepção do JSON
function getJSON() {
    fetch('https://my-activity-provider-c21fad9b3b83.herokuapp.com/api/test')
        .then(function (response) {
            return response.json()
        })
        .then(function (data) {
            console.log(data);
        })
}