window.onload = function() {
        document.getElementById('toggle-form').onclick = function () {
        openbox('form-add', document.getElementById('toggle-label'), this.checked);
    };
};
function openbox(id, toggler, state) {
    var div = document.getElementById(id);
    if(state) {
        div.style.display = 'block';
        toggler.innerHTML = 'Close';
    }
    else {
        div.style.display = 'none';
        toggler.innerHTML = 'Show Added';
    }
}
Window.onload = function() {
    document.getElementById('new_country').onsubmit = function (e) {
        e.preventDefault();
        const formData = new FormData(this);

        $.post($(this).attr("action"), formData, function(data) {
            alert(data);
        });
    };
};

function adjust_textarea(h) {
    h.style.height = "20px";
    h.style.height = (h.scrollHeight)+"px";
}