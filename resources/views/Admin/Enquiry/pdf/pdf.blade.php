<style type="text/css">
	table
	{
		width:100%;
		margin-bottom:30px;
	}
	table tbody tr td
	{
		font-size:14px !important;
		font-weight:300 !important;
	}
	.center
	{
		text-align:center;
	}
</style>
<h1 style="display:block;text-align:center;color:#e3342f">Enquiry Details</h1>
<table>
	<thead>
		<tr style="background:#007bff;color:#fff">
			<th style="width:25%;padding:7px">Id</th>
			<th style="width:25%;padding:7px">First Name</th>
			<th style="width:25%;padding:7px">Middle Name</th>
			<th style="width:25%;padding:7px">Last Name</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td class="font center" style="height:30px">{{$enquiry->id}}</td>
			<td class="font center" style="height:30px">{{$enquiry->first_name}}</td>
			<td class="font center" style="height:30px">{{$enquiry->middle_name}}</td>
			<td class="font center" style="height:30px">{{$enquiry->last_name}}</td>

		</tr>
	</tbody>
</table>
<table>
	<thead>
		<tr style="background:#007bff;color:#fff">
			<th style="width:25%;padding:7px">Email</th>
			<th style="width:25%;padding:7px">Phone</th>
			<th style="width:25%;padding:7px">Address</th>
			<th style="width:25%;padding:7px">Subject</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td class="font center" style="height:30px">{{$enquiry->email}}</td>
			<td class="font center" style="height:30px">{{$enquiry->phone}}</td>
			<td class="font center" style="height:30px">{{$enquiry->address}}</td>
			<td class="font center" style="height:30px">{{$enquiry->subject}}</td>

		</tr>
	</tbody>
</table>

<table>
	<thead>
		<tr style="background:#007bff;color:#fff">
			<th style="width:25%;padding:7px">Qualification</th>
			<th style="width:25%;padding:7px">Exprience</th>
			<th style="width:25%;padding:7px">Country Interested</th>
			<th style="width:25%;padding:7px">Service Interested</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td class="font center" style="height:30px">{{$enquiry->qualification_level}}</td>
			<td class="font center" style="height:30px">{{$enquiry->experience}}</td>
			<td class="font center" style="height:30px">{{$enquiry->country_interested}}</td>
			<td class="font center" style="height:30px">{{$enquiry->service_interested}}</td>

		</tr>
	</tbody>
</table>

<table>
	<thead>
		<tr style="background:#007bff;color:#fff">
			<th style="width:25%;padding:7px">Enquiry From</th>
			<th style="width:25%;padding:7px">Source</th>
			<th style="width:25%;padding:7px">Responded Through</th>
			<th style="width:25%;padding:7px">Eligibility</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td class="font center" style="height:30px">{{$enquiry->enquiry_from}}</td>
			<td class="font center" style="height:30px">{{$enquiry->source}}</td>
			<td class="font center" style="height:30px">{{$enquiry->responded_through}}</td>
			<td class="font center" style="height:30px">{{$enquiry->eligibility}}</td>

		</tr>
	</tbody>
</table>
<table>
	<thead>
		<tr style="background:#007bff;color:#fff">
			<th style="width:25%;padding:7px">Profession</th>
			<th style="width:25%;padding:7px">Enquired Date</th>
			<th style="width:25%;padding:7px">Color Code</th>
			<th style="width:25%;padding:7px">Office Visited</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td class="font center" style="height:30px">{{@$enquiry->Category_Enquiry->Name}}</td>
			<td class="font center" style="height:30px">{{@$enquiry->Enquired_date}}</td>
			<td class="font center" style="height:30px">{{$enquiry->color_code}}</td>
			<td class="font center" style="height:30px">{{@$enquiry->Office_visited}}</td>

		</tr>
	</tbody>
</table>
<table>
	<thead>
		<tr style="background:#007bff;color:#fff">
			<th style="width:25%;padding:7px">Visited Date</th>
			<th style="width:25%;padding:7px">Remarks</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td class="font center" style="height:30px">{{@$enquiry->Visited_date}}</td>
			<td class="font center" style="height:30px">{{$enquiry->remarks}}</td>
		</tr>
	</tbody>
</table>