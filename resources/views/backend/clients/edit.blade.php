<form action="" class="edit_client_form" method="POST" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="client_id" value="{{ $client->id }}">
    <table class="table table-bordered client_edit_table">
        <thead>
            <tr>
                <th scope="col" colspan="2" style="text-align: center">Klantgegevens Bijwerken</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td width="195px">Klantnummer</td>
                <td width="230px"><input type="text" tabindex="1" name="clientnumber" value="{{ $client->clientnumber }}"></td>
            </tr>
            <tr>
                <td>Pakket</td>
                <td>
                    <div class="d-flex package_check" data-value="{{ $client->package }}">
                        <div class="custom-control custom-switch mr-2">
                            <input type="checkbox" name="package" role="switch" class="custom-control-input" {{$client->package == "Particulier" ? "checked" : ""}} value="Particulier" id="Particulier">
                            <label class="custom-control-label" for="Particulier">Particulier</label>
                        </div>
                        <div class="custom-control custom-switch">
                            <input type="checkbox" name="package" role="switch" class="custom-control-input" {{$client->package == "Zakelijk" ? "checked" : ""}} value="Zakelijk" id="Zakelijk">
                            <label class="custom-control-label" for="Zakelijk">Zakelijk</label>
                        </div>
                    </div>
                </td>
            </tr>
            <tr>
                <td>Roepnaam</td>
                <td><input type="text" tabindex="2" name="username" value="{{ $client->username }}"></td>
            </tr>
            <tr>
                <td>Voornamen</td>
                <td><input type="text" tabindex="3" name="first_name" value="{{ $client->first_name }}"></td>
            </tr>
            <tr>
                <td>Voorletters</td>
                <td><input type="text" tabindex="4" name="initials" value="{{ $client->initials }}"></td>
            </tr>
            <tr>
                <td>Voorvoegsels</td>
                <td><input type="text" tabindex="5" name="prefix" value="{{ $client->prefix }}"></td>
            </tr>
            <tr>
                <td>Achternaam</td>
                <td><input type="text" tabindex="6" name="last_name" value="{{ $client->last_name }}" required></td>
            </tr>
            <tr>
                <td>Geboortedatum</td>
                <td>
                    <input type="text" tabindex="7" name="dob" placeholder="dd/mm/yyyy" value="{{ $client->dob }}">
                </td>
            </tr>
            <tr>
                <td>Geboorteplaats</td>
                <td><input type="text" tabindex="8" name="place_of_birth" value="{{ $client->place_of_birth }}"></td>
            </tr>
            <tr>
                <td>BSN</td>
                <td><input type="text" tabindex="9" name="ssn" value="{{ $client->ssn }}"></td>
            </tr>
            <tr>
                <td>Rijbewijs B</td>
                <td>
                    <div class="custom-control custom-switch">
                        <input tabindex="10" type="checkbox" name="driving_license" class="custom-control-input" value="Yes"  {{ $client->driving_license == "Yes" ? "checked" : "" }} id="customSwitch1">
                        <label class="custom-control-label" for="customSwitch1"></label>
                    </div>
                </td>
            </tr>
            <tr>
                <td>Geslacht</td>
                <td>
                    <div class="d-flex">
                        <div class="custom-control custom-switch mr-2">
                            <input type="checkbox" tabindex="12" name="gender" class="custom-control-input" value="Man" id="customSwitch5" {{ $client->gender == "Man" ? "checked" : "" }}>
                            <label class="custom-control-label" for="customSwitch5">Man</label>
                        </div>
                        <div class="custom-control custom-switch">
                            <input type="checkbox" name="gender" class="custom-control-input" value="Vrouw" id="customSwitch6" {{ $client->gender == "Vrouw" ? "checked" : "" }}>
                            <label class="custom-control-label" for="customSwitch6">Vrouw</label>
                        </div>
                    </div>
                </td>
            </tr>
            <tr>
                <td>Burgerlijke staat</td>
                <td>
					<select name="marital_status" tabindex="13">
						<option value="">Selecteren</option>
                        <option value="Ongehuwd" {{ $client->marital_status == "Ongehuwd" ? "selected" : "" }}>Ongehuwd</option>
                        <option value="Gehuwd" {{ $client->marital_status == "Gehuwd" ? "selected" : "" }}>Gehuwd</option>
                        <option value="Geregistreerd Partnerschap" {{ $client->marital_status == "Geregistreerd Partnerschap" ? "selected" : "" }}>Geregistreerd Partnerschap</option>
                        <option value="Gescheiden" {{ $client->marital_status == "Gescheiden" ? "selected" : "" }}>Gescheiden</option>
                        <option value="Weduwe/Weduwnaar" {{ $client->marital_status == "Weduwe/Weduwnaar" ? "selected" : "" }}>Weduwe/Weduwnaar</option>
                        <option value="Onbekend" {{ $client->marital_status == "Onbekend" ? "selected" : "" }}>Onbekend</option>
					</select>
                </td>
            </tr>

            <tr>
                <td>Woonsituatie</td>
                <td>
                    <select name="livingsituation" id="" tabindex="14">
                        <option value="">Selecteren</option>
                        <option value="Alleenstaand" {{ $client->livingsituation == "Alleenstaand" ? "selected" : "" }}>Alleenstaand</option>
                        <option value="Alleenstaand met kinderen" {{ $client->livingsituation == "Alleenstaand met kinderen" ? "selected" : "" }}>Alleenstaand met kinderen</option>
                        <option value="Verblijf in instelling" {{ $client->livingsituation == "Verblijf in instelling" ? "selected" : "" }}>Verblijf in instelling</option>
                        <option value="Zonder vaste verblijfplaats" {{ $client->livingsituation == "Zonder vaste verblijfplaats" ? "selected" : "" }}>Zonder vaste verblijfplaats</option>
                        <option value="Samenwonend met kinderen" {{ $client->livingsituation == "Samenwonend met kinderen" ? "selected" : "" }}>Samenwonend met kinderen</option>
                        <option value="Kostganger" {{ $client->livingsituation == "Kostganger" ? "selected" : "" }}>Kostganger</option>
                        <option value="Onbekend" {{ $client->livingsituation == "Onbekend" ? "selected" : "" }}>Onbekend</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Straatnaam</td>
                <td><input type="text" tabindex="15" name="street" value="{{ $client->street }}"></td>
            </tr>
            <tr>
                <td>Huisnummer</td>
                <td><input type="text" tabindex="16" name="house" value="{{ $client->house }}"></td>
            </tr>
            <tr>
                <td>Postcode</td>
                <td><input type="text" tabindex="17" name="post_code" value="{{ $client->post_code }}"></td>
            </tr>
            <tr>
                <td>Woonplaats</td>
                <td><input type="text" tabindex="18" name="city" value="{{ $client->city }}"></td>
            </tr>
            <tr>
                <td>Telefoon</td>
                <td><input type="text" tabindex="19" name="phone" value="{{ $client->phone }}"></td>
            </tr>
            <tr>
                <td>E-mail</td>
                <td><input type="email" tabindex="20" name="email" value="{{ $client->email }}"></td>
            </tr>
            <tr>
                <td>Leefgeldrekening</td>
                <td><input type="text" tabindex="21" name="private_account" value="{{ $client->private_account }}"></td>
            </tr>
            <tr>
                <td>Beheerrekening Particulier</td>
                <td><input type="text" tabindex="22" name="control_private_account" value="{{ $client->control_private_account }}"></td>
            </tr>
            <tr>
                <td>Beheerrekening Zakelijk</td>
                <td><input type="text" tabindex="23" name="control_business_bank_account" value="{{ $client->control_business_bank_account }}"></td>
            </tr>
            <tr>
                <td style="padding-top: 2px"><input type="button" tabindex="24" class="btn btn-danger btn-sm btn-block btn-cancel" value="Annuleren"></td>
                <td><input type="button" class="btn btn-primary btn-sm btn-block btn-update" value="Wijzigingen Opslaan"></td>
            </tr>
        </tbody>
    </table>
</form>
<script>
    $(document).ready(function() {
        $('input,select').on('keypress', function (e) {
            if (e.which == 13) {
                e.preventDefault();
                var $next = $('[tabIndex=' + (+this.tabIndex + 1) + ']');
                console.log($next.length);
                if (!$next.length) {
                    $next = $('[tabIndex=1]');
                }
                $next.focus();
            }
        });
    })
</script>
