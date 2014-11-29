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

namespace PowerEcommerce\Pattern\Behavioral\Memento {

    /**
     * Class Originator
     * @package PowerEcommerce\Pattern\Behavioral\Memento
     */
    class Originator
    {
        /**
         * @var string
         */
        private $_state;

        /**
         * @return string
         */
        public function getState()
        {
            return $this->_state;
        }

        /**
         * @param string $state
         */
        public function setState($state)
        {
            $this->_state = $state;
        }

        /**
         * @return \PowerEcommerce\Pattern\Behavioral\Memento\Memento
         */
        function createMemento()
        {
            return (new Memento($this->getState()));
        }

        /**
         * @param \PowerEcommerce\Pattern\Behavioral\Memento\Memento $memento
         */
        function setMemento(Memento $memento)
        {
            $this->setState($memento->getState());
        }
    }
}
