
$.validator.setDefaults({
    submitHandler: function() {
        alert("Фотографии сохранены!");
    },
    showErrors: function(map, list) {
        // there's probably a way to simplify this
        var focussed = document.activeElement;
        if (focussed && $(focussed).is("input, textarea")) {
            $(this.currentForm).tooltip("close", {
                currentTarget: focussed
            }, true)
        }
        this.currentElements.removeAttr("title").removeClass("ui-state-highlight");
        $.each(list, function(index, error) {
            $(error.element).attr("title", error.message).addClass("ui-state-highlight");
        });
        if (focussed && $(focussed).is("input, textarea")) {
            $(this.currentForm).tooltip("open", {
                target: focussed
            });
        }
    }
});




$(document).ready(function () {
    (function() {
        // use custom tooltip; disable animations for now to work around lack of refresh method on tooltip
        $("#commentForm, #signupForm").tooltip({
            show: false,
            hide: false
        });

        // validate the comment form when it is submitted
        $("#commentForm").validate();

        // validate signup form on keyup and submit


        // propose username by combining first- and lastname
        $("#username").focus(function() {
            var firstname = $("#firstname").val();
            var lastname = $("#lastname").val();
            if (firstname && lastname && !this.value) {
                this.value = firstname + "." + lastname;
            }
        });

        //code to hide topic selection, disable for demo
        var newsletter = $("#newsletter");
        // newsletter topics are optional, hide at first
        var inital = newsletter.is(":checked");
        var topics = $("#newsletter_topics")[inital ? "removeClass" : "addClass"]("gray");
        var topicInputs = topics.find("input").attr("disabled", !inital);
        // show when newsletter is checked
        newsletter.click(function() {
            topics[this.checked ? "removeClass" : "addClass"]("gray");
            topicInputs.attr("disabled", !this.checked);
        });


        $(":submit").button();
    })();
});




