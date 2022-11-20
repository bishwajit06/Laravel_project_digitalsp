<style>
    h1{
        color:#00ADEE;

    }
    h2{
        color:#666666;
        border: 1px solid #666666;
        padding: 3px 8px;
    }
    h3{
        color: #666666;
    }
    p{
        font-size: 12px;
    }
    .clearfix {
        clear: both;
    }

    .text-left {
        text-align: left;
    }

    .text-right {
        text-align: right;
    }

    .text-center {
        text-align: center;
    }
    .container {
        font-family: Verdana, Geneva, Tahoma, sans-serif;
        color: #333333;
    }
    .header-left{
        float: left;
    }
    .header-right{
        float: right;
    }
    .name-area-left{
        float: left;
    }
    .name-area-right{
        float: right;;
    }

    .table {
    width: 100%;
    max-width: 100%;
    margin-bottom: 20px;
    font-size: 12px;
    }

    thead {
    display: table-header-group;
    vertical-align: middle;
    border-color: inherit;
}

tr {
    display: table-row;
    vertical-align: inherit;
    border-color: inherit;
}
.table>tbody>tr>td, .table>tbody>tr>th, .table>tfoot>tr>td, .table>tfoot>tr>th, .table>thead>tr>td, .table>thead>tr>th {
    padding: 8px;
    line-height: 1.42857143;
    vertical-align: top;
    border-top: 1px solid #ddd;
}

</style>

<div class="container">
    <div class="header">
        <div class="header-left">
            <h1>DIGITAL SPACE</h1>
            <p style="margin-top:-10px;">
                <strong>Digital Space, Inc.</strong><br>
                Khutakhali Bazar, Dacope Khulna<br>(Infront of Agrani Bank limited)<br>
                P: 01705311618, 01303349905
            </p>
        </div>
        <div class="header-right">
            <h2>INVOICE</h2>
        </div>
    </div>
    <div class="clearfix"></div>
    <div class="name-area">
        <div class="name-area-left">
            <h3>{{$payment->user->first_name}} {{$payment->user->last_name}}</h3>
            <p style="margin-top:-10px;">
                <strong>Info</strong><br>
                Address: {{$payment->user->address}}<br>
                P: {{$payment->user->phone}}
            </p>
        </div>
        <div class="name-area-right">
            <table class="table">
                <tbody>
                    <tr>
                    <td class="text-left">INVOICE NO :</td>
                    <td class="text-right">POR0{{$payment->id}}</td>
                    </tr>
                    <tr>
                    <td class="text-left">INVOICE DATE :</td>
                    <td class="text-right">{{$payment->created_at}}</td>
                    </tr>
                    <tr style="background: #00ADEE; color:#ffffff;">
                    <td class="text-left"><strong>Total Due :</strong></td>
                    <td class="text-right"><strong>0 BDT</strong></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <div class="clearfix"></div>
    <div class="">
        <table style="margin-top:50px;" class="table">
            <thead>
                <tr style="background: #00ADEE; color:#ffffff;">
                <th style="width:60px" class="text-center">SN</th>
                <th class="text-left">Course Name</th>
                <th style="width:60px" class="text-left">DURATION</th>
                <th style="width:140px" class="text-right">COURSE FEES</th>
                <th style="width:90px" class="text-right">TOTAL</th>
                </tr>
            </thead>
            <tbody>
                @php
                $totalPrice = 0;
                $discount = 0;
                @endphp
                @foreach($payment->courses()->latest()->get() as $key => $course)
                <tr>
                <td class="text-center">{{ $key + 1 }}</td>
                <td>{{$course->name}}</td>
                <td class="text-left">{{$course->duration}} Month</td>
                <td class="text-right">{{$course->fees}} BDT</td>
                <td class="text-right">
                    {{$course->fees}} BDT
                </td>
                @php
                    $totalPrice += $course->fees;
                @endphp
                </tr>
                @endforeach
                <tr>
                <td colspan="3" rowspan="5">
                    <h4>Terms and Conditions</h4>
                    <p>Thank you for buy our course.</p>
                </td>
                
                <td class="text-right"><strong>Subtotal</strong></td>
                <td class="text-right">{{$totalPrice}} BDT</td>
                </tr>
                <tr>
                <td class="text-right no-border"><strong>VAT Included in Total</strong></td>
                <td class="text-right">0 BDT</td>
                </tr>
                <tr>
                <td class="text-right no-border"><strong>Discount</strong></td>
                <td class="text-right">0 BDT</td>
                </tr>
                <tr style="background: #00ADEE; color:#ffffff;">
                <td class="text-right no-border">
                    <div class="well well-small green"><strong>Grand Total</strong></div>
                </td>
                <td class="text-right"><strong>{{$totalPrice}} BDT</strong></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
