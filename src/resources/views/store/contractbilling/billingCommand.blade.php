<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Account Id</th>
            <th>Plan Id</th>
            <th>Billing Date</th>
            <th>User Fee</th>
            <th>Property Fee</th>
        </tr>
    </thead>
    <tbody>
        @foreach ( $contractBilling as $billing )
            <tr>
                <td>{{$billing->id}}</td>
                <td>{{$billing->acount_id}}</td>
                <td>{{$billing->plan_id}}</td>
                <td>{{$billing->billing_date}}</td>
                <td>{{$billing->add_user_fee}}</td>
                <td>{{$billing->add_property_fee}}</td>
            </tr>
        @endforeach
    </tbody>
</table>