<?php

namespace App\Traits;

use Illuminate\Http\Request;

trait Get_All_Employee {

    /**
     * @param Request $request
     * @return $this|false|string
     */
    public function sub_items( $sub_items,$all_experts) {
        //merge all child experts
        $this->all_experts = $this->all_experts->merge($sub_items->experts->all());


        if ($sub_items->allChildren)
    {
        if(count($sub_items->allChildren) > 0)
        {
            foreach ($sub_items->allChildren as $childItems)
            {
               // get all  child experts
                $this->sub_items($childItems,$this->all_experts);
             }
        }

    }


        }
        public function sub_org( $childorg,$all_org_unit) {
            //merge all child experts
            $this->all_org_unit = $this->all_org_unit->merge($childorg->experts->all());


            if ($childorg->allChildren)
        {
            if(count($childorg->allChildren) > 0)
            {
                foreach ($childorg->allChildren as $childorg)
                {
                    //dd($childorg);
                   // get all  child experts
                    $this->sub_org($childorg,$this->all_org_unit);
                 }
            }

        }


            }

    public function getemployee($departments)
    {
        if ($departments->allChildren)
        {
            //merge all experts of the current organziation
            $this->all_experts = $this->all_experts->merge($departments->experts->all());



            if(count($departments->allChildren) > 0){


                foreach ($departments->allChildren as $childItems)
                {

                    // call recursive function to get all child experts of the current organazation
                    $this->sub_items($childItems,$this->all_experts);

                }

            }
        }
    }
    public function getOrgUnit($departments)
    {
        if ($departments->allChildren)
        {

            //merge all org unit of the current organziation
            $this->all_org_unit = $this->all_org_unit->merge($departments->children->all());


            if(count($departments->allChildren) > 0){


                foreach ($departments->allChildren as $childorg)
                {


                  // call recursive function to get all child org unit of the current organazation
                  $this->sub_org($childorg,$this->all_org_unit);
                }

            }
        }
    }

}
