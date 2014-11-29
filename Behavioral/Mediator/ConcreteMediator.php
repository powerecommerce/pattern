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

namespace PowerEcommerce\Pattern\Behavioral\Mediator {

    /**
     * Class ConcreteMediator
     * @package PowerEcommerce\Pattern\Behavioral\Mediator
     */
    class ConcreteMediator extends Mediator
    {
        /**
         * @var \PowerEcommerce\Pattern\Behavioral\Mediator\ConcreteColleague1
         */
        private $_colleague1;

        /**
         * @var \PowerEcommerce\Pattern\Behavioral\Mediator\ConcreteColleague2
         */
        private $_colleague2;

        /**
         * @param ConcreteColleague1 $colleague1
         */
        public function setColleague1(ConcreteColleague1 $colleague1)
        {
            $this->_colleague1 = $colleague1;
        }

        /**
         * @param ConcreteColleague2 $colleague2
         */
        public function setColleague2(ConcreteColleague2 $colleague2)
        {
            $this->_colleague2 = $colleague2;
        }

        /**
         * @param string $message
         * @param \PowerEcommerce\Pattern\Behavioral\Mediator\Colleague $colleague
         */
        function send($message, Colleague $colleague)
        {
            if ($colleague === $this->_colleague1) {
                $this->_colleague2->notify($message);
            } else {
                $this->_colleague1->notify($message);
            }
        }
    }
}
