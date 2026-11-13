<?php
// ValaisIT.ch — contact form handler.
// Sends the message by e-mail. Answers with JSON when called by js/script.js,
// or with a small confirmation page when JavaScript is off.

const MAIL_TO   = 'it@noth.ch';
const MAIL_FROM = 'no-reply@valaisit.ch';   // must be an address of the hosting domain

$texts = [
  'de' => [
    'ok'    => 'Nachricht gesendet. Ich melde mich so bald wie möglich bei Ihnen.',
    'error' => 'Die Nachricht konnte nicht gesendet werden. Rufen Sie mich bitte an: 079 305 53 50.',
    'back'  => 'Zurück zur Seite',
  ],
  'fr' => [
    'ok'    => 'Message envoyé. Je vous réponds dès que possible.',
    'error' => 'Le message n’a pas pu être envoyé. Appelez-moi au 079 305 53 50.',
    'back'  => 'Retour au site',
  ],
];

function clean(string $key, int $max): string {
  $value = trim((string)($_POST[$key] ?? ''));
  return mb_substr($value, 0, $max);
}

$lang    = (($_POST['lang'] ?? 'de') === 'fr') ? 'fr' : 'de';
$name    = clean('name', 100);
$reach   = clean('reach', 120);
$message = clean('message', 3000);
$isBot   = clean('website', 200) !== '';          // honeypot: humans never see this field

$ok = false;
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  if ($isBot) {
    $ok = true;                                   // pretend success, send nothing
  } elseif ($name !== '' && $reach !== '' && $message !== '') {
    $oneLine = fn(string $s): string => preg_replace('/[\r\n]+/', ' ', $s);   // no header injection
    $subject = 'ValaisIT.ch – ' . $oneLine($name);
    $body    = "Name: $name\nKontakt: $reach\nSprache: $lang\n\n$message\n";
    $headers = [
      'From'         => 'ValaisIT.ch <' . MAIL_FROM . '>',
      'Content-Type' => 'text/plain; charset=UTF-8',
    ];
    if (filter_var($reach, FILTER_VALIDATE_EMAIL)) {
      $headers['Reply-To'] = $reach;
    }
    $ok = @mail(MAIL_TO, '=?UTF-8?B?' . base64_encode($subject) . '?=', $body, $headers);
  }
}

if (str_contains($_SERVER['HTTP_ACCEPT'] ?? '', 'application/json')) {
  header('Content-Type: application/json; charset=UTF-8');
  echo json_encode(['ok' => $ok]);
  exit;
}

$t = $texts[$lang];
?>
<!DOCTYPE html>
<html lang="<?= $lang ?>-CH">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="robots" content="noindex">
<title>ValaisIT.ch</title>
<link rel="stylesheet" href="/css/style.css">
</head>
<body>
<main class="wrap band">
  <p class="h2"><?= htmlspecialchars($ok ? $t['ok'] : $t['error']) ?></p>
  <p style="margin-top:24px"><a class="btn btn-solid" href="/<?= $lang ?>/#kontakt"><?= htmlspecialchars($t['back']) ?></a></p>
</main>
</body>
</html>
