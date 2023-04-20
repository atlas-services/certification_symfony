function handleArguments() {

    let selectElement = document.querySelector('#request_twig_filter_myfilter');
    let arguments = document.querySelector('#request_twig_filter_arguments');
    let label_arguments = document.querySelector('#label_arguments');

    output = selectElement.value;
    let array_arguments = ['batch', 'column'];

    if(array_arguments.includes(output)){
        label_arguments.classList.remove('d-none');   
        arguments.classList.remove('d-none');   
    }else{
        label_arguments.classList.add('d-none');  
        arguments.classList.add('d-none');  
    }

}