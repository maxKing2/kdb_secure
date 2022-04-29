<table class="table table-bordered">
	<tr><td>{{ _lang('User Name') }}</td><td>{{ $transaction->user->name }}</td></tr>
	<tr><td>{{ _lang('User Email') }}</td><td>{{ $transaction->user->email }}</td></tr>
	<tr><td>{{ _lang('Amount') }}</td><td>{{ decimalPlace($transaction->amount,currency($transaction->currency->name)) }}</td></tr>

	@if($transaction->type == 'Wire_Transfer')
	<tr><td>{{ _lang('Bank Name') }}</td><td>{{ $transaction->other_bank->name }}</td></tr>
	@endif

	@if($transaction->transaction_details != null)
		@foreach($transaction->transaction_details as $key => $value)
		<tr>
			<td>{{ ucwords(str_replace('_',' ',$key)) }}</td>
			<td>{{ $value }}</td>
		</tr>
		@endforeach
	@endif

    <tr><td>{{ _lang('DR/CR') }}</td><td>{{ strtoupper($transaction->dr_cr) }}</td></tr>
	<tr><td>{{ _lang('Type') }}</td><td>{{ str_replace("_"," ",$transaction->type) }}</td></tr>
	@if ($transaction->description != null)
	<tr><td>{{ _lang('Description') }}</td><td>{{ $transaction->description }}</td></tr>		
	@endif
	<tr><td>{{ _lang('Status') }}</td><td>{!! xss_clean(transaction_status($transaction->status)) !!}</td></tr>
	<tr><td>{{ _lang('Note') }}</td><td>{{ $transaction->note }}</td></tr>
	@if ($transaction->sender != null )
	<tr><td>{{ _lang('Sender') }}</td><td>{{ $transaction->sender}}</td></tr>
	@endif
	<tr><td>{{ _lang('Date') }}</td><td>{{ $transaction->created_at}}</td></tr>
</table>

