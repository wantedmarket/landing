$( document ).ready(function() {

    $('.data-recived').hide();
    const addBtn = document.getElementById('leadBtn');

//---------- Login ---------------------//

    $('#loginForm').submit(function( e ) {

        e.preventDefault();
        let email = $('#exampleDropdownFormEmail2').val();
        let password = $('#exampleDropdownFormPassword2').val();
        console.log( email + ' ', password );

        $.ajax({
            method: "POST",
            url: "ajax/login.php",
            data: { 'email': email, 'password': password }
        })
        .done(function( result ) {
            if( result == 'success') {
                location.href = 'leads-panel.php';
            } else {
                alert("ההתחברות נכשלה");
            }
        });
    })

    //---------- Create Lead ---------------------//

    $('#leadForm').submit(function( e ) {
        e.preventDefault();
        let fullName = $('#fullname-input').val();
        let email = $('#email-input').val();
        let phone = $('#phone-number-input').val();
        let city = $('#city-input').val();
        let check1;
        let check2;

        if ($('#check1-input').is(":checked")){
            check1 = 1;
        }else {
            check1 = 0;
        }
        if ($('#check2-input').is(":checked")){
            check2 = 1;
        }else {
            check2 = 0;
        }

        let formValid = formValidation(fullName, email, phone, city);

        if (formValid) {

            $.ajax({
                method: "POST",
                url: "ajax/add_lead.php",
                data: { 'fullName': fullName, 'email': email, 'phone': phone, 'city': city, 'check1': check1, 'check2': check2  }
            })
            .done(function( result ) {
                console.log(' ' + result);
                $('.form-container').hide();
                $('.data-recived').show(1000);
            });
        }
    });

    //---------- update Lead ---------------------//

    $('#updateLead').submit(function( e ) {
        e.preventDefault();
        let fullName = $('#update-fname-input').val();
        let email = $('#update-email-input').val();
        let phone = $('#update-phone-input').val();
        let city = $('#update-city-input').val();
        let id = $('#update-id-input').val();
        let formValid = formValidation(fullName, email, phone, city);

        if (formValid) {
            $.ajax({
                method: "POST",
                url: "ajax/update_lead.php",
                data: { 'fullName': fullName, 'email': email, 'phone': phone, 'city': city, 'id': id }
            })
            .done(function( result ) {
                if( result === "success") {
                    location.reload();
                } else {
                    alert('failed');
                }
            });
        }

    });
});

function formValidation(fullName, email, phone, city) {

    let regName = /^([a-z\u0590-\u05fe]{2,})+\s+([a-z\u0590-\u05fe]{2,})+$/i;
    let regEmail = /^[a-zA-Z0-9\-_]+(\.[a-zA-Z0-9\-_]+)*@[a-z0-9]+(\-[a-z0-9]+)*(\.[a-z0-9]+(\-[a-z0-9]+)*)*\.[a-z]{2,4}$/;
    let counter = 0;

    if ( fullName == "" || !regName.test(fullName) ) {
        $('#fullname-input').addClass( "is-invalid" );
    } else {
        $('#fullname-input').removeClass( "is-invalid" );
        counter++;
    }

    if ( !regEmail.test(email) || email == "") {
        $('#email-input').addClass( "is-invalid" );
    } else {
        $('#email-input').removeClass( "is-invalid" );
        counter++;
    }

    if ( phone == "" ) {
        $('#phone-number-input').addClass( "is-invalid" );
    } else {
        $('#phone-number-input').removeClass( "is-invalid" );
        counter++;
    }

    if ( city == "" ) {
        $('#city-input').addClass( "is-invalid" );
    } else {
        $('#city-input').removeClass( "is-invalid" );
        counter++;
    }

    if (counter === 4) {
        return true;
    }else {
        return false;
    }
}

