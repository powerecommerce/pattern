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
     * Class Composite
     * @package PowerEcommerce\Pattern\Structural\Composite
     */
    class Composite extends Component
    {
        /**
         * @var \PowerEcommerce\Pattern\Structural\Composite\Component[]
         */
        private $_children = [];

        /**
         * @param \PowerEcommerce\Pattern\Structural\Composite\Component $component
         */
        function add(Component $component)
        {
            if (!in_array($component, $this->_children, true)) {
                $this->_children[] = $component;
            }
        }

        /**
         * @param \PowerEcommerce\Pattern\Structural\Composite\Component $component
         */
        function remove(Component $component)
        {
            $this->_children = array_filter($this->_children, function ($value) use ($component) {
                return $value !== $component;
            });
        }

        /**
         * @param int $depth
         */
        function display($depth)
        {
            var_dump([$this->name, $depth, __CLASS__, spl_object_hash($this)]);

            foreach ($this->_children as $component) {
                $component->display($depth + 1);
            }
        }
    }
}
