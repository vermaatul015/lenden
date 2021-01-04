<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{Config::get('admin_constant.title')}}</title>
</head>
<body>

    <table style="width:100%; max-width: 600px; margin: 0px auto; color:#696969; font-size:16px;">
        <tr>
            <td colspan="3" style="text-align: center; padding: 20px 0px; border-bottom:#e8e8e8 solid 1px;">
                <a href="#" target="_blank"><img src="{{asset('dist/img/logo.png')}}" alt="" width="100px"></a>
            </td>
        </tr>
        <tr>
            <td colspan="3" style="padding:10px 0px;">
            @lang('setup.hi') {{$user->name}},
            </td>
        </tr>
        <tr>
            <td colspan="3" class="orderinfo">
            {{ trans('setup.forgot_password_textline', ['title' => Config::get('admin_constant.title')]) }}
            </td>
        </tr>
        <br>
        <tr>
            <td colspan="3" style="padding:10px 0px;">
                <table width="100%">
                    <tr>
                        <td style="line-height: 25px;"><br><b style="color:#000;"></b></td>
                        <td align="center"><a href="{{$url}}" style="background: #3c8dbc; padding:15px 10px; color:#fff; font-weight:600; font-size:14px; text-decoration: none; word-break: break-all; display: inline-block;">@lang('setup.reset_my_password')</a></td>
                    </tr>
                </table>
            </td>
        </tr>
       
        <tr>
            <td colspan="3" style="height: 20px;">&nbsp;</td>
        </tr>
        <tr>
            <td colspan="3" style="border-top:#e8e8e8 solid 2px; border-bottom:#e8e8e8 solid 2px; padding:10px 0px;">
                <table width="100%">
                    <tr>
                        <!-- <td>
                            <table>
                                <tr>
                                    <td style="color:#696969;">@lang('setup.get_the_app'):</td>
                                    <td><a href="#" style="margin: 0px 2px;"><img width="24px" src="{{asset('email-images/android.png')}}"></a></td>
                                    <td><a href="#" style="margin: 0px 2px;"><img width="24px" src="{{asset('email-images/iphone.png')}}"></a></td>
                                </tr>
                            </table>
                        </td> -->
                        <td align="right">
                            <table>
                                <tr>
                                    <td style="color:#696969;">@lang('setup.follow_us_on'):</td>
                                    <td><a href="#" style="margin: 0px 2px;"><img width="24px" src="{{asset('email-images/facebook.png')}}"></a></td>
                                    <!-- <td><a href="#" style="margin: 0px 2px;"><img width="24px" src="{{asset('email-images/twitter.png')}}"></a></td>
                                    <td><a href="#" style="margin: 0px 2px;"><img width="24px" src="{{asset('email-images/pinterest.png')}}"></a></td>
                                    <td><a href="#" style="margin: 0px 2px;"><img width="24px" src="{{asset('email-images/instagram.png')}}"></a></td> -->
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td colspan="3" style="padding:20px 0px 5px; color:gray; text-align:center;">&copy;{{date('Y')}} @lang('setup.all_right_reserved')</td>
        </tr>
        <!-- <tr>
            <td colspan="3" style="padding:5px 0px 20px; color:gray; text-align:center;">7119 Pleasant Street, Copperas Cove, TX 76522</td>
        </tr> -->
    </table>




</body>
</html>