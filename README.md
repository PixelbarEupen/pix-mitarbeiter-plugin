# Pixelbar Mitarbeiter Plugin

## Beschreibung
Dieses Plugin erweitert Wordpress um eine "Mitarbeiter-Rubrik". Dort können Mitarbeiter eingefügt, deren Positionen und Funktionen festgelegt werden und zusätzliche Informationen eingefügt werden.

## Eingabemöglichkeiten
Folgende Eingabemöglichkeiten gibt es:
 * Titel (Titelfeld - benötigt für den Namen und Vornamen)
 * Funktion (Textfeld)
 * Sonstiges (Textfeld)
 * Bild (Bild)
 * E-Mail Adresse (Textfeld)
 * URL zu einer Website (Textfeld)
 * Telefonnummer (Textfeld -> wegen "+ Vorwahl")
 
__WICHTIG:__ Es ist möglich, über das Theme weitere Felder zu registrieren. Mehr dazu unter "__Erweitert__"

---

## Ausgabe
### Shortcode
Die Ausgabe der einzelnen Mitarbeiter findet über Shortcodes statt:

```[mitarbeiter position="Mitglied" title="Mitglieder" accordeon="true" limit="-1" sort_order="DESC" accordeon_per_user="true" show_on="hover"]```

Das obige Beispiel beinhält __ALLE__ Parameter, die mitgegeben werden können:
 * `position`: __(string)__ Name / Slug der Position (Custom Taxonomy)
 * `title`: __(string)__ Titel, der über der jeweiligen Auflistung erscheinen soll
 * `accordeon`: __(bool)__ true oder false ob die Accordeon Ausklappfunktion benutzt werden soll oder nicht. (Muss in den Einstellungen aktiviert werden!)
 * `limit` __(int)__ Limitiert die Ausgabe. '-1' steht für alle. Default = -1
 * `sort_order` __(string)__ ASC oder DESC (ascending oder descending). Default ist 'DESC'.
 * `accordeon_per_user` __(bool)__ Fügvt den Accordeon Klappeffekt bei jedem Mitarbeiter hinzu, sodass erst nach einem Klick die Zusätzlichen Infos ausklappen. Kann gleichzeitig zum `accordeon` genutzt werden. Default ist `false`
 * `show_on` __(string)__ `click` oder `hover` legt fest, ob beim klcik oder beim hovern die Infos der Mitarbeiter angezeigt werden sollen. Greift nur auf `accordeon_per_user`. Default ist `click`.
 
## Erweitert
### Eigene Felder über das Theme einfügen
Es ist möglich, über `add_filter()` weitere Felder für die Mitarbeiter hinzuzufügen. Gehe von folgendem Beispiel aus:

```
function pix_changefields($box_args){
	
	$new_field = array (
		'key' => 'field_5321qsdp7',
		'label' => 'Zweite URL',
		'name' => 'pix_mitarbeiter_zweite_url',
		'type' => 'text',
		'instructions' => 'Geben Sie hier die 2. URL zu einer Website ein.',
		'default_value' => '',
		'placeholder' => '',
		'prepend' => '',
		'append' => '',
		'formatting' => 'none',
		'maxlength' => '',
	);
				
	array_push($box_args['fields'],$new_field);
	
	return $box_args;
}
add_filter('pix_mitarbeiter_fields','pix_changefields');
```

`array_push` pusht das neue Array `$new_field` ans Ende des Arrays `$box_args['fields']` und registriert so das Feld.
Über `add_filter` wird der Filter aktiv und das neue Feld reingeholt.

__SEHR WICHTIG__ ist, dass das Feld `key` mit `field_`beginnt und danach mit einer einzigartigen Nummern/Zeichenreihefolge beendet wird, damit es ein Alleinstellunsgsmerkmal (ID) hat.

### Das eigene Feld in die Ausgabe einbinden
```
function pix_mitarbeiter_add_output($output) {
	if(get_field('pix_mitarbeiter_zweite_url')):
		$newfield = '<a target="_blank" href="'.get_field('pix_mitarbeiter_zweite_url').'" title="'.get_field('pix_mitarbeiter_zweite_url').'">';
			$newfield .= get_field('pix_mitarbeiter_zweite_url');
		$newfield .= '</a>';
	endif;
	
	return $output.$newfield;
}
add_filter('pix_mitarbeiter_output','pix_mitarbeiter_add_output');
```
