<!-- <script>
$(document).ready(function() {
			// Load the home page on first load
			$('#content').load('./page/home.php');

			// Handle navigation
			$('nav a').click(function(event) {
				event.preventDefault();
				var page = './page/' + $(this).attr('href');
                console.log(page);
				$('#content').load(page);
			});
		});
</script> -->
<script>
      $(function() {
        $('#content').load('./page/home.php');

        $('a').click(function(e) {
          e.preventDefault();
          var url = './page/' + $(this).attr('href');
          $.ajax({
            url: url,
            success: function(data) {
              $('#content').html(data);
            }
          });
        });
      });
</script>