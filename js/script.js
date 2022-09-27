$(document).ready(function () {
    if ($('.active')[0]) {
        const src = $(this).find('.on');
        src.attr('src', '../../img/chevron-right(2).svg');
    }

    $('.anc').on('mouseenter', function () {
        const src = $(this).find('.icon');
        src.attr('src', '../../img/chevron-right(2).svg');
    });

    $('.anc').on('mouseleave', function () {
        const src = $(this).find('.icon');
        src.attr('src', '../../img/chevron-right.svg');
    });

    $('.page-scroll').on('click', function (e) {
        const href = $(this).attr('href');
        console.log(href);
        const section = $(href);
        console.log(section);

        $('html,body').animate(
            {
                scrollTop: section.offset().top - 60,
            },
            1800,
            'easeInOutQuart',
        );

        e.preventDefault();
    });

    const togglePassword = $('#togglePassword');
    const password = $('#id_password');
    const toggleCPassword = $('#toggleCPassword');
    const cpassword = $('#id_cpassword');

    togglePassword.on('click', function () {
        const type = password.attr('type') === 'password' ? 'text' : 'password';
        password.attr('type', type);
        $(this).toggleClass('fa-eye-slash');
    });

    toggleCPassword.on('click', function () {
        const type = cpassword.attr('type') === 'password' ? 'text' : 'password';
        cpassword.attr('type', type);
        $(this).toggleClass('fa-eye-slash');
    });

    const menuToggle = $('#menuToggle');
    const navbar = $('#navUl');

    menuToggle.on('click', function () {
        navbar.toggleClass('slide');
    });

    $(window).resize(function () {
        if (window.matchMedia('(max-width: 768px)').matches) {
            let anchor = $('.page-scroll');
            const navbarResp = $('#navUl');
            const menuToggleResp = $('#menuToggle');
            anchor.on('click', function () {
                navbarResp.removeClass('slide');
                menuToggleResp.prop('checked', false);
            });
        }
    });

    $(window).on('scroll', function () {
        const header = $('header');
        header.toggleClass('sticky', window.scrollY > 0);
    });
});

// window.addEventListener('scroll', function () {
//     const header = document.querySelector('header');
//     header.classList.toggle('sticky', window.scrollY > 0);
// });

function addFields() {
    var number = document.getElementById('count').value;
    var container = document.getElementById('item-subkriteria');
    while (container.hasChildNodes()) {
        container.removeChild(container.lastChild);
    }
    for (i = 0; i < number; i++) {
        var newlabel = document.createElement('label');
        newlabel.innerHTML = 'Subkriteria ' + (i + 1);
        container.appendChild(newlabel);
        var input = document.createElement('input');
        input.type = 'text';
        input.name = 'subkriteria[]';
        input.classList.add('list-subkriteria');
        container.appendChild(input);
        container.appendChild(document.createElement('br'));
    }
}

function on() {
    document.getElementById('id_overlay').style.display = 'block';
}

function off() {
    document.getElementById('id_overlay').style.display = 'none';
}
