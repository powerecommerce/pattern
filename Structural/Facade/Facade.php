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

namespace PowerEcommerce\Pattern\Structural\Facade {

    /**
     * Class Facade
     * @package PowerEcommerce\Pattern\Structural\Facade
     */
    class Facade
    {
        /**
         * @var \PowerEcommerce\Pattern\Structural\Facade\SubSystem1
         */
        private $_subSystem1;

        /**
         * @var \PowerEcommerce\Pattern\Structural\Facade\SubSystem2
         */
        private $_subSystem2;

        /**
         * @var \PowerEcommerce\Pattern\Structural\Facade\SubSystem3
         */
        private $_subSystem3;

        function __construct()
        {
            $this->_subSystem1 = new SubSystem1();
            $this->_subSystem2 = new SubSystem2();
            $this->_subSystem3 = new SubSystem3();
        }

        function methodA()
        {
            $this->_subSystem1->method();
            $this->_subSystem3->method();
        }

        function methodB()
        {
            $this->_subSystem2->method();
            $this->_subSystem1->method();
            $this->_subSystem3->method();
        }
    }
}
