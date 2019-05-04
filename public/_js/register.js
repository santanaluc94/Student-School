function validform() {
    var a = document.forms["my-form"]["name"].value;
    var b = document.forms["my-form"]["email"].value;
    var c = document.forms["my-form"]["phone"].value;
    var d = document.forms["my-form"]["birthday"].value;
    var e = document.forms["my-form"]["gender"].value;

    if (a==null || a=="")
    {
        alert("Please Enter Your Full Name");
        return false;
    }else if (b==null || b=="")
    {
        alert("Please Enter Your Email Address");
        return false;
    }else if (c==null || c=="")
    {
        alert("Please Enter Your Phone Number");
        return false;
    }else if (d==null || d=="")
    {
        alert("Please Enter Your Birthday");
        return false;
    }else if (e==null || e=="")
    {
        alert("Please Enter Your Gender");
        return false;
    }

}