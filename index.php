<?php
$clientId = $_COOKIE['clientId'] ?? 'clienta';
?>
<!DOCTYPE html>
<html>

<head>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body>
    <button class="switch-client" data-client="clienta">Client A</button>
    <button class="switch-client" data-client="clientb">Client B</button>
    <button class="switch-client" data-client="clientc">Client C</button>

    <div class="dynamic-div"
        data-module="cars"
        data-script="ajax">
    </div>

    <script>
        function loadDynamicContent(clientId) {
            var module = $(".dynamic-div").data("module");
            var script = $(".dynamic-div").data("script");

            var url = "/customs/" + clientId + "/modules/" + module + "/" + script + ".php";

            $.get(url, function(response) {
                $(".dynamic-div").html(response);
            });
        }

        var currentClient = "<?php echo $clientId; ?>";
        loadDynamicContent(currentClient);

        $(".switch-client").click(function() {
            var newClient = $(this).data("client");
            document.cookie = "clientId=" + newClient;
            loadDynamicContent(newClient);
        });
    </script>
</body>

</html>