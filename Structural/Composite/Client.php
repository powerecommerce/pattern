<?php

/**
 * Copyright (c) 2015 DD Art Tomasz Duda
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in
 * all copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
 * THE SOFTWARE.
 */

namespace PowerEcommerce\Pattern\Structural\Composite {

    /**
     * Class Client
     * @package PowerEcommerce\Pattern\Structural\Composite
     */
    class Client
    {
        function __construct()
        {
            $c1 = new Composite("Composite 1");
            $c1->add(new Leaf("Leaf 11"));
            $c1->add(new Leaf("Leaf 12"));

            $c2 = new Composite("Composite 2");
            $c2->add(new Leaf("Leaf 21"));
            $c2->add(new Leaf("Leaf 22"));

            $c1->add($c2);
            $c1->add($l13 = new Leaf("Leaf 13"));
            $c1->remove($l13);

            $c1->display(1);
        }
    }
}
