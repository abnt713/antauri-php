<?php

namespace Antauri\Syntax;

interface ISyntax{

    public function parseToRetrievable($configIdentifier, $workingDir);

}
