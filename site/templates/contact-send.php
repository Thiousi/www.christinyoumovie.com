<?php

header::contentType('application/json');
echo json_encode([
    'success' => $form->successful(),
    'message' => trim($form->message()),
    'errors' => array_keys(array_filter(get(), function ($field) use ($form) {
        return $form->hasError($field);
    }, ARRAY_FILTER_USE_KEY)),
]);
