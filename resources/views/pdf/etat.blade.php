<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />
	
	<div style="clear:both"></div>

	<title>Editable Invoice</title>
	
	<link rel='stylesheet' type='text/css' href='{{asset('public/js/invoice/css/style.css')}}' />
	<link rel='stylesheet' type='text/css' href='{{asset('public/js/invoice/css/print.css')}}' media="print" />

</head>

<body>

	<div id="page-wrap">

		<textarea id="header">ETAT DU COMPTE</textarea>
		
		<div id="identity">
		
            <textarea id="address">
			Fiangonan'i Jesoa Kristy eto Madagasikara&#10;
			Tranovato Ambatonankanga, Antananarivo&#10;
			Numéro de compte : {{$compte->compte}}&#10;
			Phone: (261) 34-68-403-79&#10;
			</textarea>

            <div id="logo">
              <img id="image" src="{{asset('public/img/beoro_logo.png')}}" alt="logo" />
            </div>
		
		</div>
		
		<div style="clear:both"></div>
		
		<div id="identity">
		@php
                $nature = substr($compte->compte,0,1);
                switch ($nature) {
                    case '6':
                        $nature = "débiteur";
                        break;
                    case '7':
                        $nature = "créditeur";
                        break;
                }
			@endphp
		<textarea id="address">
			Derrnière mise à jour : {{\Carbon\Carbon::now()->format('d/m/Y H:i:s')}}&#10;
			Numéro de compte : {{$compte->compte}}&#10;
			Nature du compte : {{ucfirst($nature)}}&#10;
			Libelle du compte : {{$compte->libelle}}&#10;
		</textarea>

		<textarea id="address"></textarea>

		<textarea id="address">
			Nom d'utilisateur : {{Auth::user()->name}}&#10;
			Entité : {{ucfirst(Auth::user()->entite->nom)}}&#10;
			Role : {{ucfirst(Auth::user()->role)}}&#10;
			Date de tirage : {{ date('d/m/Y')}}&#10;
		</textarea>
		
		</div>
		
		<table id="items">
		
		  <tr>
		      <th>Description</th>
		      <th>Date</th>
		      <th>Type</th>
		      <th>N° Pièce</th>
			  <th>N° Chèque</th>
			  <th>Montant</th>
		  </tr>
		  @foreach($mouvements as $m)
		  <tr class="item-row">
		      <td class="description">{{$m->libelle}}</td>
		      <td>{{ date('m/d/Y',strtotime($m->date)) }}</td>
			 @if($m->type=='B') 
			  	<td>Banque</td>
			@elseif($m->type=='C')
				<td>Caisse</td>
			@endif
			  <td>{{ (!empty($m->piece)?$m->piece : '-') }}</td>
			  <td>{{ (!empty($m->cheque)?$m->cheque : '-') }}</td>
		      <td lass="description">{{ (!empty($m->debit->montant)?$m->debit->montant : $m->credit->montant) }} Ar</td>
		  </tr>
		  @endforeach
		<tr id="hiderow">
				<td colspan="6"><h3>Montant TOTAL</h3></td>
			  </tr>
		  
		  <tr>
		      <td colspan="3" class="blank"> </td>
		      <td colspan="2" class="total-line">Sous total en MGA</td>
		      <td class="total-value"><div id="subtotal">{{$total}}</div></td>
		  </tr>
		  <tr>

		      <td colspan="3" class="blank"> </td>
		      <td colspan="2" class="total-line">Total en MGA</td>
		      <td class="total-value"><div id="total">{{$total}}</div></td>
		  </tr>
		  <tr>
		      <td colspan="3" class="blank"> </td>
		      <td colspan="2" class="total-line">Amount Paid en MGA</td>

		      <td class="total-value"><textarea id="paid">0.00</textarea></td>
		  </tr>
		  <tr>
		      <td colspan="3" class="blank"> </td>
		      <td colspan="2" class="total-line balance">Balance Due MGA</td>
		      <td class="total-value balance"><div class="due">0.00</div></td>
		  </tr>
		
		</table>
		<br/>
		<div id="terms">
		  <h5>Termes et conditions</h5>
		  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in
			   reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in 
			   culpa qui officia deserunt mollit anim id est laborum.</p>
		</div>
	
	</div>
	
</body>

</html>