var guid = "";
var steam_name = "";

function send_it() {
    var name = document.getElementById("steam_name").value;

    $.ajax({
        type: "POST",
        url: "/projects/whitelist/whitelist.php",
        data: {
            name: name
        },
        dataType: 'json',
        success: function (data) {
            document.getElementById("avatar").src = data[0];
            document.getElementById("user_name").innerHTML = data[1];
            steam_name = data[1];
            guid = data[2];
            document.getElementById("loading-profile").style.display="none";
            hold_guid();
        }
    });
}

function hold_guid() {
    var check = document.getElementById("user_name").innerHTML;

    if (check == "") {
        guid = "";
        alert('No profile found');
        location.reload();
    };
};

function make_whitelisted() {

    $.ajax({
        type: "POST",
        url: "/projects/whitelist/guid_to_whitelist.php",
        data: {
            id: guid,
            name: steam_name
        },
        success: function (data) {
            if (!data.length == 0) {
                alert(data);
            }
        }
    });
}