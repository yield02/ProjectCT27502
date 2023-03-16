<?php
//kiểm tra tính hợp lý của URL;
function checkURL(){
    if(!isset($_GET['url'])) {
        echo 'home';
    }

    // else if($_SERVER['REQUEST_METHOD'] && $_GET['url']) {
        
    // }

    else {
        switch ($_GET['url']){
            case 'login':
                echo 'login';
                break;
            case 'manage':
                echo 'manage';
                break;
            default: 
                echo 'home';
                break;
        }
    }

}



?>

<script>
    function loadContent(page) {
        $.ajax({
            url: './page/' + page + '.php',
            success: function(data) {
                $('#content').html(data);
                window.history.pushState({
                    page: page
                }, null, '/' + page);   
            }
        });
    }

    $(document).ready(function() {
        loadContent('<?php checkURL() ?>');
        $('a').click(function(e) {
            e.preventDefault();
            var page = $(this).attr('href');
            loadContent(page);
        });
        $(window).on('popstate', function(event) {
            var state = event.originalEvent.state;
            if (state) {
                loadContent(state.page);
            } else {
                loadContent('home');
            }
        });
    });
</script>