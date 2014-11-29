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
     * Class Component
     * @package PowerEcommerce\Pattern\Structural\Composite
     */
    abstract class Component
    {
        /**
         * @var string
         */
        protected $name;

        /**
         * @param string $name
         */
        function __construct($name)
        {
            $this->name = $name;
        }

        /**
         * @param \PowerEcommerce\Pattern\Structural\Composite\Component $component
         */
        abstract function add(Component $component);

        /**
         * @param \PowerEcommerce\Pattern\Structural\Composite\Component $component
         */
        abstract function remove(Component $component);

        /**
         * @param int $depth
         */
        abstract function display($depth);
    }
}
