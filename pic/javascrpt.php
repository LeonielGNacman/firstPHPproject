    <script type="text/javascript">
function blockSpecialChar(e){
    var k;
    document.all ? k = e.keyCode : k = e.which;
    return ((k > 64 && k <91 ) || (k > 96 && k < 123) || k == 8 || k == 32 || (k >= 48 && k <+ 57));

}
</script>
<script language="Javascript">
    function isNumberKey(evt)
    {
        var charCode = (evt.which) ? evt.which : even.keyCode
        if (charCode > 31 && (charCode >57))
            return false;
    }

</script>
<script type="text/javascript">
    function val();
    {
        var letters = /^[A-Za-z]+$/;
        if(frm.first_name.value.match(letters) && frm.middle_name.value.match(letters) && frm.last_name.value.match(letters))
        {

        }
        else{
            alert('Names must be not empty and contain letters only');

        }
    }
        {
            var phoneno = /^\d{11}$/;
            if(frm.contact_number.value.match(phoneno))
            {

            }
            else
            {
                alert("Contact Number should be 11 numbers");
                return false;
            }
        }

{
    var passw = /^[A-Za-z0-9]{7,14}$/;
    if(frm.pass.value.match(passw))
    {

    }
    else
    {
        alert('Password should be 7 to 16 characters')
        return false;

    }
}
</script>