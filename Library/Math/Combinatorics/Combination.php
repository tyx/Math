<?php

/**
 * Hoa
 *
 *
 * @license
 *
 * New BSD License
 *
 * Copyright © 2007-2011, Ivan Enderlin. All rights reserved.
 *
 * Redistribution and use in source and binary forms, with or without
 * modification, are permitted provided that the following conditions are met:
 *     * Redistributions of source code must retain the above copyright
 *       notice, this list of conditions and the following disclaimer.
 *     * Redistributions in binary form must reproduce the above copyright
 *       notice, this list of conditions and the following disclaimer in the
 *       documentation and/or other materials provided with the distribution.
 *     * Neither the name of the Hoa nor the names of its contributors may be
 *       used to endorse or promote products derived from this software without
 *       specific prior written permission.
 *
 * THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS "AS IS"
 * AND ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT LIMITED TO, THE
 * IMPLIED WARRANTIES OF MERCHANTABILITY AND FITNESS FOR A PARTICULAR PURPOSE
 * ARE DISCLAIMED. IN NO EVENT SHALL THE COPYRIGHT HOLDERS AND CONTRIBUTORS BE
 * LIABLE FOR ANY DIRECT, INDIRECT, INCIDENTAL, SPECIAL, EXEMPLARY, OR
 * CONSEQUENTIAL DAMAGES (INCLUDING, BUT NOT LIMITED TO, PROCUREMENT OF
 * SUBSTITUTE GOODS OR SERVICES; LOSS OF USE, DATA, OR PROFITS; OR BUSINESS
 * INTERRUPTION) HOWEVER CAUSED AND ON ANY THEORY OF LIABILITY, WHETHER IN
 * CONTRACT, STRICT LIABILITY, OR TORT (INCLUDING NEGLIGENCE OR OTHERWISE)
 * ARISING IN ANY WAY OUT OF THE USE OF THIS SOFTWARE, EVEN IF ADVISED OF THE
 * POSSIBILITY OF SUCH DAMAGE.
 */

namespace Hoa\Math\Combinatorics {

/**
 * Class \Hoa\Math\Combinatorics\Combination.
 *
 * Some functions related to combinatorics.
 *
 * @author     Ivan Enderlin <ivan.enderlin@hoa-project.net>
 * @copyright  Copyright © 2007-2011 Ivan Enderlin.
 * @license    New BSD License
 */

class Combination {

    /**
     * Let E a finite set of cardinality n (n ∈ ℕ*), then the set K_k(E) of the
     * k-combination with repetition of E is finite and its cardinality is equal
     * to:
     *     Γ_n^k = C_{n + k - 1}^k
     * which is the number of k-combination of n + k - 1 elements.
     * Example:
     *     foreach(Hoa\Math\Combinatorics\Combination::Γ(3, 2) as $solution)
     *         echo implode($solution, ' '), "\n";
     * Will output:
     *     2 0 0
     *     1 1 0
     *     1 0 1
     *     0 2 0
     *     0 1 1
     *     0 0 2
     *
     * @access  public
     * @param   int  $n    n.
     * @param   int  $k    k.
     * @return  array
     */
    public static function Γ ( $n, $k ) {

        $out  = array();
        $tmp  = null;
        $i    = 0;
        $o    = array_fill(0, $n, 0);
        $o[0] = $k;

        while($k != $o[$i = $n - 1]) {

            $out[] = $o;
            $tmp   = $o[$i];
            $o[$i] = 0;

            while($o[$i] == 0) --$i;

            --$o[$i];
            $o[$i + 1] = $tmp + 1;
        }

        $out[] = $o;

        return $out;
    }
}

}