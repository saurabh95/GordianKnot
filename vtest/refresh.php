<?php
include_once('CAS/CAS.php');
phpCAS::client(CAS_VERSION_2_0,'felicity.iiit.ac.in/cas', 443,''); // initializes phpCAS
phpCAS::setNoCasServerValidation(); // no SSL validation for the CAS server

if(phpCAS::isAuthenticated())
{
    //reload main page
    echo"
<script type='text/javascript'>
window.top.location.href='http://felicity.iiit.ac.in/threads/redirect.php?dest=http://felicity.iiit.ac.in/~gordian_beta/main.php';
</script>
";
}
