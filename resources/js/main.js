import axios from 'axios';

let form = document.getElementById('form');
let success = document.getElementById('success');
let errors = document.getElementById('errors');
let newLink = document.getElementById('new-link');

form.addEventListener('submit', async function (event) {

    event.preventDefault();

    let formData = new FormData(form);
    const data = {};
    for (let [key, val] of formData.entries()) {
        Object.assign(data, {[key]: val})
    }
    await axios({
        method: 'post',
        url: '/form',
        data: data
    })
    .then(function (response) {
        success.innerHTML = response.data.success;
        newLink.value = response.data.minlink;
    })
    .catch(function (error) {
        let ul = '<ul>'
        for (let index in error.response.data.errors.link) {
            ul += '<li>' + error.response.data.errors.link[index] + '</li>';
        }
        ul += '</ul>'
        errors.innerHTML = ul;
    });
});
