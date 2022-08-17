import 'bootstrap/dist/css/bootstrap.css'
const CSRF = document.querySelector('meta[name=csrf-token]').content;

document.addEventListener('DOMContentLoaded', function(){
    let formAddress = document.querySelector('.address-form');

    if(formAddress !== null){
        formAddress.addEventListener('submit', function(e){
            e.preventDefault();
            let address = formAddress.querySelector('[name=address]').value;
            let body = JSON.stringify({ address });
            //let body = new FormData(formAddress);
            
            request('some', {
                method: 'POST',
                body
            })
            .then(r => r.json())
            .then(data => {
                console.log(data);
            });
        });
    }
});

async function request(uri, options){
    let url = '/api/' + uri;
    
    options.headers ||= {};
    options.headers = {
        'X-Requested-With': 'XMLHttpRequest',
        'Accept': 'application/json',
        'Content-Type': 'application/json',
        'X-CSRF-TOKEN': CSRF
    }

    return fetch(url, options);
}