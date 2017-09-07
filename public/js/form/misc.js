$(document).ready(function(){
    $('#tAvailable').on('click', function(){
        $target = $('#available');
        $value = $target.html();
        if($value.toLowerCase() === 'indisponible'){
            $target.html('Disponible');
        } else {
            $target.html('Indisponible');
        }
        console.log($value);
    });
});