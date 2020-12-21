let spinner = {
    start() {
        $("#overlay").fadeIn(300);
    },

    stop() {
        setTimeout(function(){
            $("#overlay").fadeOut(300);
        },500);
    }
};

module.exports = spinner;
