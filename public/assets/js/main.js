/**
 * Abrir o menu lateral
 */
$(".navbar-toggle").click(function() {
    $(".lateral-menu, .lateral-menu .scroll").toggleClass("menu-open");
})

/**
 * Abrir um submenu
 */
$(".lateral-menu ul li").click(function() {
    var x = $(this).first();
    $(x).toggleClass('selected-submenu')
})

/**
 * Lazy load - carregamento de imagens
 */
var loadImages;

$(document).ready(function() {
    $(".lazy-img img").on("load", function() {
        $(this).addClass("loaded");
    });

    $(document).on("scroll", function() {
        loadImages();
    });

    (loadImages = function loadImages() {
        $.each($(".lazy-img"), function() {
            var block = $(this);
            var image = block.find("img");

            if (isOnScreen(block)) {
                var url = image.data("url");

                if (image.attr("src") != url) {
                    image.attr("src", url);
                };
            }
        });
    })();
});

function isOnScreen(element) {
    var win = $(window);

    var screenTop = win.scrollTop();
    var screenBottom = screenTop + win.height();

    var elementTop = element.offset().top;
    var elementBottom = elementTop + element.height();

    return elementBottom > screenTop && elementTop < screenBottom;
}

/**
 * Validar o formulário de ano lectivo
 */
$("#form-answer").validate({
    rules: {
        answer: {
            required: true,
            minlength: 255,
            maxlength: 9
        },
        questionId: {
            required: true
        },
        correct: {
            required: true
        },
    },
    highlight: function(element) {
        $(element).closest('.form-group').addClass('has-error');
    },
    unhighlight: function(element) {
        $(element).closest('.form-group').removeClass('has-error');
    },
    errorElement: 'span',
    errorClass: 'help-block',
    errorPlacement: function(error, element) {
        if (element.parent('.input-group').length) {
            error.insertAfter(element.parent());
        } else {
            error.insertAfter(element);
        }
    },
    messages: {
        answer: {
            required: "Este campo não pode ser vazio!",
            maxlength: "Este campo deve possuir no máximo 255 caracteres!",
            minlength: "Este campo deve possuir no mínimo 9 caracteres!"
        },
        questionId: {
            required: "Este campo não pode ser vazio!",
        },
        correct: {
            required: "Este campo não pode ser vazio!"
        },
    }
});

/**
 * Validar o formulário de banco
 */
$("#form-chapter").validate({
    rules: {
        name: {
            required: true,
            maxlength: 100,
            minlength: 9
        },
        description: {
            maxlength: 255,
        }
    },
    highlight: function(element) {
        $(element).closest('.form-group').addClass('has-error');
    },
    unhighlight: function(element) {
        $(element).closest('.form-group').removeClass('has-error');
    },
    errorElement: 'span',
    errorClass: 'help-block',
    errorPlacement: function(error, element) {
        if (element.parent('.input-group').length) {
            error.insertAfter(element.parent());
        } else {
            error.insertAfter(element);
        }
    },
    messages: {
        name: {
            required: "Este campo não pode ser vazio!",
            maxlength: "Este campo deve possuir no máximo 100 caracteres!",
            minlength: "Este campo deve possuir no mínimo 9 caracteres!"
        },
        description: {
            required: "Este campo não pode ser vazio!",
            maxlength: "Este campo deve possuir no máximo 255 caracteres!"
        }
    }
});

/**
 * Validar o formulário expense-category
 */
$("#form-question").validate({
    rules: {
        question: {
            required: true,
            maxlength: 255,
            minlength: 9
        },
        chapterId: {
            required: true
        },
    },
    highlight: function(element) {
        $(element).closest('.form-group').addClass('has-error');
    },
    unhighlight: function(element) {
        $(element).closest('.form-group').removeClass('has-error');
    },
    errorElement: 'span',
    errorClass: 'help-block',
    errorPlacement: function(error, element) {
        if (element.parent('.input-group').length) {
            error.insertAfter(element.parent());
        } else {
            error.insertAfter(element);
        }
    },
    messages: {
        question: {
            required: "Este campo não pode ser vazio!",
            maxlength: "Este campo deve possuir no máximo 255 caracteres!",
            minlength: "Este campo deve possuir no mínimo 9 caracteres!"
        },
        chapterId: {
            required: "Este campo não pode ser vazio!",
        },
    }
});

/**
 * Validar os campos do tipo number
 */
jQuery.extend(jQuery.validator.messages, {
    number: "Entre com um número válido!",
});


/**
 * Mostra a foto seleccionada
 * 
 * @param {*} data 
 */
function cannotAddPicture() {
    $("#alert-error").html(
        '<div class="alert alert-danger" role="alert">' +
        '<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>' +
        'A fotografia só pode ser carregada depois do cadastro!' +
        '</div>'
    );
}


/**
 * Submeter um formulário
 */
function submitForm(form) {
    var form = $(form).closest('form')
    form.submit()
}