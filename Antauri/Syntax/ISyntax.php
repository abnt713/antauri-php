<?php

namespace Antauri\Interpreter;

interface ISyntax{

    public function parseToRetrievable($configIdentifier, $workingDir);

}
