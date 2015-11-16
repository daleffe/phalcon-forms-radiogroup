# Phalcon Forms
## Radio Group
Phalcon Form element to group Radio inputs

### Installation
Update your composer.json with following options:
```
{
	"repositories": [
		{
			"type": "vcs",
			"url": "https://github.com/daleffe/phalcon-forms-radiogroup"
		}
	],
    "require": {
		  "daleffe/phalcon-forms-radiogroup": "dev-master",
    }
}
```
> I will check how to put this package in Packagist.org.

### Usage
In your forms class use:
``` php
use Daleffe\Phalcon\Forms\Element\RadioGroup;

// Status
$status = new RadioGroup("status", [
  'elements' => array("0" => "Disabled", "1" => "Enabled",
  'class' => array("radio radio-danger radio-inline", "radio radio-success radio-inline")
]);

$status->addValidators(array(
  new PresenceOf(array(
		'message' => "Status required"
	)),
));

if (is_null($devices)) {
  $status->setDefault('1');
} else {
  $status->setDefault($devices->status);
}

$status->setLabel("Status");

$this->add($status);
```

So, in view use:
```php
{{ form.render('status') }}
```

This will make the Phalcon correctly apply the filters, validators and *bind()* method to persist in the database.

### Credits
Credit should be given to [@edwardhew](https://github.com/edwardhew) who proposed this solution in the [Phalcon forum](https://forum.phalconphp.com/discussion/7471/radio-group).

If you have a better proposal on how to apply this solution, open a [issue](https://github.com/daleffe/phalcon-forms-radiogroup/issues/new).
