<?php
$clientId = $_COOKIE['clientId'] ?? 'clienta';
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Projet Auto</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body>
    <div class="container my-4">
        <div class="mb-3">
            <button class="btn btn-primary switch-client" data-client="clienta">Client A</button>
            <button class="btn btn-primary switch-client" data-client="clientb">Client B</button>
            <button class="btn btn-primary switch-client" data-client="clientc">Client C</button>
        </div>

        <div class="dynamic-div" data-module="cars" data-script="list"></div>
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
            document.cookie = "clientId=" + newClient + ";path=/";
            loadDynamicContent(newClient);
        });
    </script>
</body>

</html>