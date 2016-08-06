<?php

class Error_404 extends Exception {
  public function msg() {
    return <<<_END
    <h1>404 Page Not Found</h1>
_END;
  }
}
