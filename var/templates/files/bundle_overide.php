<?php

namespace {{ NAMESPACE }};

use Symfony\Component\HttpKernel\Bundle\Bundle;

class {{ SRC }} extends Bundle
{
    public function getParent()
    {
        return '{{ VENDOR }}';
    }
}
?>