<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Email de {{config('app.name')}}</title>
</head>

<body style="margin: 0; padding: 0; font-family:'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;">
<table align="center" border="0" cellpadding="0" cellspacing="0" width="600" style="margin-top: 15px; border-collapse: collapse;">
    <tr>
        <td align="center" bgcolor="#ABC8E2" style="border-radius: 15px 15px 0px 0px; padding: 40px 0 30px 0;">
            <img src="{{asset('public/img/beoro_logo.png')}}" alt="KIOSK MG" width="150" height="50" style="display: block;"/>
        </td>
    </tr>
    <tr>
        <td bgcolor="#e6e6e6" style="border-radius: 0px 0px 15px 15px; padding: 40px 30px 40px 30px;">
            <table border="0" cellpadding="0" cellspacing="0" width="100%">
                <tr>
                    <td align="center" style="font-size: 27pt; color:#375D81; font-family:'Times New Roman', Times, serif; text-align: center; padding: 0px 60px 0px 60px;">
                        {{ $titre }}
                    </td>
                </tr>
                <tr>
                    <td align="center" style="font-size: 12pt; color: #3d3d3d; text-align: center; padding: 60px 60px 0px 60px;">
                        {!! $contenu.'.<br/><br/>'.$text !!}
                    </td>
                </tr>
                <tr>
                    <td align="center" style="font-size: 16pt; text-align: center; padding: 60px 60px 0px 60px;">
                       
                    </td>
                </tr>
            </table>
        </td>
    </tr>
    <tr>
        <td style="padding: 40px 30px 40px 30px;">
            <table border="0" cellpadding="0" cellspacing="0" width="100%">
                <tr>
                    <td align="center" style="font-size: 12pt; color: #737373; text-align: center;">
                      © {{ config('app.name') }} - FJKM Tranovato Ambatonankanga {{date('Y')}}
                    </td>
                </tr>
            </table>
        </td>
    </tr>
</table>
</body>
</html>