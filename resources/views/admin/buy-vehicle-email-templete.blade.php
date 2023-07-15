@component('mail::message')

<h1></h1>
<h1>Seller Details</h1>
    <p><b>Name:</b> {{$data['seller_name']}}</p>
    <p><b>Email:</b> {{$data['seller_email']}}</p>
    <p><b>Phone:</b> {{$data['seller_phone']}}</p>
    <p><b>Fax:</b> {{$data['seller_fax']}}</p>
    <p><b>Address:</b> {{$data['seller_address']}}</p><br>
<h1>Vehicle Details</h1>
    <p><b>Maker:</b> {{$data->maker->maker_name}}</p>
    <p><b>Model Name:</b> {{$data['model_name']}}</p>
    <p><b>Model Year:</b> {{$data['model_year']}}</p>
    <p><b>Displasement:</b> {{$data['displasement']}}</p>
    <p><b>Mileage:</b> {{$data['mileage']}}</p>
    <p><b>Chassis No:</b> {{$data['chassis_no']}}</p>
    <p><b>Inspection Expiry Date:</b> {{$data['inspection_expiry_date']}}</p>


Thanks,<br>
{{ config('app.name') }}
@endcomponent
