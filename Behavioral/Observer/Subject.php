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

namespace PowerEcommerce\Pattern\Behavioral\Observer {

    /**
     * Class Subject
     * @package PowerEcommerce\Pattern\Behavioral\Observer
     */
    abstract class Subject
    {
        /**
         * @var \PowerEcommerce\Pattern\Behavioral\Observer\Observer[]
         */
        private $_observer = [];

        /**
         * @param \PowerEcommerce\Pattern\Behavioral\Observer\Observer $observer
         */
        function detach(Observer $observer)
        {
            $this->_observer = array_filter($this->_observer, function ($value) use ($observer) {
                return $value !== $observer;
            });
        }

        /**
         * @param \PowerEcommerce\Pattern\Behavioral\Observer\Observer $observer
         */
        function attach(Observer $observer)
        {
            if (!in_array($observer, $this->_observer, true)) {
                $this->_observer[] = $observer;
            }
        }

        function notify()
        {
            foreach ($this->_observer as $observer) {
                $observer->update();
            }
        }
    }
}
