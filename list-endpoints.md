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

$connector->departments()->withPracticeId('{practiceId}')->get();
```

* `/{practiceId}/departments/{departmentId}`

```php
<?php

$connector->departments('{departmentId}')->withPracticeId('{practiceId}')->get();
```

## HealthHistoryForms

* `/{practiceId}/healthhistoryforms`

```php
<?php

$connector->healthHistoryForms()->withPracticeId('{practiceId}')->get();
```

* `/{practiceId}/healthhistoryforms/{healthHistoryFormId}`

```php
<?php

$connector->healthHistoryForms('{healthHistoryFormId}')->withPracticeId('{practiceId}')->get();
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

$connector->persons('{personId}')->balances()->get();
```

* `/persons/{personId}/chart/balances/{balanceId}`

```php
<?php

$connector->persons('{personId}')->balances('{balanceId}')->get();
```

### Charges

* `/persons/{personId}/chart/charges`

```php
<?php

$connector->persons('personId')->charges('id-3')->get();
```

* `/persons/{personId}/chart/charges/{chargesId}`

```php
<?php

$connector->persons('personId')->charges('chargesId')->get();
```
