# List Endpoints

> Note: You can use any of the available methods like `get()`, `post()`, `put()`, `patch()` and `delete()`. We use `get()` method for the example below.

## Appointments

* `/appointments`

```php
<?php

$connector->appointments()->get();
```

* `/appointments/{appointmentId}`

```php
<?php

$connector->appointments('{appointmentId}')->get();
```

### Appointment Health History Forms

* `/{practiceId}/appointments/{appointmentId}/healthhistoryforms`

```php
<?php

$connector->withPracticeId('{practiceId}')
    ->appointments('{appointmentId}')
    ->healthHistoryForms()
    ->get();
```

* `/{practiceId}/appointments/{appointmentId}/healthhistoryforms/{healthHistoryFormId}`

```php
<?php

$connector->withPracticeId('{practiceId}')
    ->appointments('{appointmentId}')
    ->healthHistoryForms('{healthHistoryFormId}')
    ->get();
```

## Charts

* `/charts`

```php
<?php

$connector->charts()->get();
```

* `/charts/{chartId}`

```php
<?php

$connector->charts('{chartId}')->get();
```

## Departments

* `/{practiceId}/departments`

```php
<?php

$connector->withPracticeId('{practiceId}')
    ->departments()
    ->get();
```

* `/{practiceId}/departments/{departmentId}`

```php
<?php

$connector->withPracticeId('{practiceId}')
    ->departments('{departmentId}')
    ->get();
```

## HealthHistoryForms

* `/{practiceId}/healthhistoryforms`

```php
<?php

$connector->withPracticeId('{practiceId}')
    ->healthHistoryForms()
    ->get();
```

* `/{practiceId}/healthhistoryforms/{healthHistoryFormId}`

```php
<?php

$connector->withPracticeId('{practiceId}')
    ->healthHistoryForms('{healthHistoryFormId}')
    ->get();
```

## Insurances

* `/insurances`

```php
<?php

$connector->insurances()->get();
```

* `/insurances/{insuranceId}`

```php
<?php

$connector->insurances('{insuranceId}')->get();
```

## Persons

* `/persons`

```php
<?php

$connector->persons()->get();
```

* `/persons/{personId}`

```php
<?php

$connector->persons('{personId}')->get();
```

### Balances

* `/persons/{personId}/chart/balances`

```php
<?php

$connector->persons('{personId}')
    ->balances()
    ->get();
```

* `/persons/{personId}/chart/balances/{balanceId}`

```php
<?php

$connector->persons('{personId}')
    ->balances('{balanceId}')
    ->get();
```

### Charges

* `/persons/{personId}/chart/charges`

```php
<?php

$connector->persons('{personId}')
    ->charges()
    ->get();
```

* `/persons/{personId}/chart/charges/{chargeId}`

```php
<?php

$connector->persons('{personId}')
    ->charges('{chargesId}')
    ->get();
```

### Charts

* `/persons/{personId}/chart`

```php
<?php

$connector->persons('{personId}')
    ->charts()
    ->get();
```

* `/persons/{personId}/chart/{chartId}`

```php
<?php

$connector->persons('{personId}')
    ->charts('{chartId}')
    ->get();
```

### Encounters

* `/persons/{personId}/chart/encounters`

```php
<?php

$connector->persons('{personId}')
    ->encounters()
    ->get();
```

* `/persons/{personId}/chart/encounters/{encounterId}`

```php
<?php

$connector->persons('{personId}')
    ->encounters('{encounterId}')
    ->get();
```

### Insurances

* `/persons/{personId}/insurances`

```php
<?php

$connector->persons('{personId}')
    ->insurances()
    ->get();
```

* `/persons/{personId}/insurances/{insuranceId}`

```php
<?php

$connector->persons('{personId}')
    ->insurances('{insuranceId}')
    ->get();
```

#### Insurance Cards

* `/persons/{personId}/insurances/{insuranceId}/cards`

```php
<?php

$connector->persons('{personId}')
    ->insurances('{insuranceId}')
    ->cards()
    ->get();
```

* `/persons/{personId}/insurances/{insuranceId}/cards/{cardId}`

```php
<?php

$connector->persons('{personId}')
    ->insurances('{insuranceId}')
    ->cards('{cardId}')
    ->get();
```

#### Insurance Cards Front/Back

* `/persons/{personId}/insurances/{insuranceId}/cards/{cardId}/front`

```php
<?php

$connector->persons('{personId}')
    ->insurances('{insuranceId}')
    ->cards('{cardId}')
    ->front()
    ->get();
```

* `/persons/{personId}/insurances/{insuranceId}/cards/{cardId}/back`

```php
<?php

$connector->persons('{personId}')
    ->insurances('{insuranceId}')
    ->cards()
    ->back()
    ->get();
```
