<?php


if (!function_exists('success')) {
  function success($message, $data=[], $code=200)
  {
    return response()->json(['success' => true, 'message' => $message, 'data' => $data], $code);
  }
}

if (!function_exists('error')) {
  function error($message, $data=[], $code=500)
  {
    return response(['success' => true, 'message' => $message, 'data' => $data], $code);
  }
}

if (!function_exists('pagination')) {
  function pagination($data)
  {
      return [
          'currentPage' => $data->currentPage(),
          'lastPage' => $data->lastPage(),
          'previousPageUrl' => $data->previousPageUrl(),
          'nextPageUrl' => $data->nextPageUrl(),
          'total' => $data->total()
      ];
  }
}