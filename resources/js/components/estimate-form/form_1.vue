<style>
  .pull-right{
        float: right;
    }
  .loader{  /* Loader Div Class */
      position: absolute;
      top:0px;
      right:0px;
      width:100%;
      height:100%;
      background-color:#eceaea;
      /* background-image: url('http://localhost:8000/images/glowing-ring.gif'); */
      background-image: url('/images/glowing-ring.gif');
      background-size: 50px;
      background-repeat:no-repeat;
      background-position:center;
      z-index:10000000;
      opacity: 0.4;
      filter: alpha(opacity=40);
  }
</style>
<template>
  <div>
   <vue-progress-bar></vue-progress-bar>     
    <div class="card text-white" style="background-color:rgba(24,104,172,1)">
      <div class="card-body">
          <div class="form">          
              <div class="row">
                <div class="loader" v-if="loading"></div> 
                  <div class="col-md-9">
                      <div class="row">        
                          <div class="col-xs-6 col-sm-6 col-md-6">
                              <div class="form-group">
                                  <strong>Project Title:</strong>
                                  <input type="text" class="form-control" v-model="project_title">           
                              </div>
                          </div>  
                          <div class="col-xs-6 col-sm-6 col-md-6">
                              <div class="row">
                                  <div class="col-xs-6 col-sm-6 col-md-6">
                                      <div class="form-group">
                                          <strong>Estimate Type:</strong>
                                          <select class="form-control" @change="getResults" v-model="category">
                                              <option value=""></option>
                                              <option value=1>Low End Concrete Dwelling</option>
                                              <option value=2> High End Concrete Dwelling</option>
                                              <option value=3>Low End Timber Dwelling</option>
                                              <option value=4>High End Timber Dwelling</option>
                                              <option value=5>Ware House</option>                    
                                          </select>
                                      </div>
                                  </div>
                                  <div class="col-xs-6 col-sm-6 col-md-6">
                                      <div class="form-group">
                                          <strong>Country:</strong>
                                          <input type="text" class="form-control" v-model="country">
                                      </div>
                                  </div>
                              </div>
                              
                          </div>  
                      </div>
                      <div class="row">        
                          <div class="col-xs-4 col-sm-4 col-md-4">
                              <div class="form-group">
                                  <strong>QUANTITY - SQ/FT:</strong>
                                  <input type="text" class="form-control" v-model="quantity_sq_ft">           
                              </div>
                          </div>  
                          <div class="col-xs-4 col-sm-4 col-md-4">
                              <div class="form-group">
                                  <strong>NO. OF UNITS:</strong>
                                  <input type="text" class="form-control" name="project_title">           
                              </div>
                          </div>
                          <div class="col-xs-4 col-sm-4 col-md-4">
                              <div class="form-group">
                                  <strong>NO. OF STORIES:</strong>
                                  <input type="text" class="form-control" name="project_title">           
                              </div>
                          </div>
                      </div>  
                      <div class="row">        
                          <div class="col-xs-4 col-sm-4 col-md-4">
                              <div class="form-group">
                                  <strong>UNIT RATE- IMPERIAL:</strong>
                                  <input type="text" class="form-control" name="project_title">           
                              </div>
                          </div>  
                          <div class="col-xs-4 col-sm-4 col-md-4">
                              <div class="form-group">
                                  <strong>COST / SF:</strong>
                                  <input type="text" class="form-control" name="project_title">           
                              </div>
                          </div>
                          <div class="col-xs-4 col-sm-4 col-md-4">
                              <div class="form-group">
                                  <strong>UNIT RATE- METRIC:</strong>
                                  <input type="text" class="form-control" name="project_title">           
                              </div>
                          </div>
                      </div>
                      <div class="row">        
                          <div class="col-xs-4 col-sm-4 col-md-4">
                              <div class="form-group">
                                  <strong>COST / M2:</strong>
                                  <input type="text" class="form-control" name="project_title">           
                              </div>
                          </div>  
                          <div class="col-xs-4 col-sm-4 col-md-4">
                              <div class="form-group">
                                  <strong>TOTAL ELEMENT FACTOR(%):</strong>
                                  <input type="text" class="form-control" name="project_title">           
                              </div>
                          </div>                        
                      </div>
                      <div class="row">
                          <div class="col-xs-6 col-sm-6 col-md-6">
                              <div class="form-group">
                                  <strong>PERCENTAGE ROCK IN SUBSTRUCTURE(%):</strong>
                                  <input type="text" class="form-control" name="project_title">           
                              </div>
                          </div>
                      </div>
                      <div class="row">        
                          <div class="col-xs-6 col-sm-6 col-md-6">
                              <div class="form-group">
                                  <strong>Project Discription:</strong>
                                  <textarea class="form-control" rows="5" name="project_title"></textarea>          
                              </div>
                          </div>
                          <div class="col-xs-6 col-sm-6 col-md-6">
                              <div class="form-group">
                                  <strong>UNIT COST:</strong>
                                  <input type="text" class="form-control" name="project_title">      
                              </div>
                              <div class="form-group">
                                  <strong>TOTAL COST:</strong>
                                  <input type="text" class="form-control" name="project_title">      
                              </div>
                          </div>                  
                      </div> 
                      <div class="row">        
                          <div class="col-xs-12 col-sm-12 col-md-12">
                              <span class="btn btn-success">ADD UNIT#</span>     
                              <span @click="getResults" class="btn btn-success">RUN</span>                                                                        
                              <span class="btn btn-success">Clear / Reset Form</span>                                                                             
                              <span class="btn btn-success">Print / Preview</span>                                                            
                          </div>                              
                      </div>  
                      <div class="row">        
                          <div class="col-xs-12 col-sm-12 col-md-12">
                              <p><strong>Building Element List</strong></p>  
                              <p>NOTE: ADD YOUR BUILDING SQUARE FOOTAGE; PERCENTAGE ROCK IN SUBSTRUCTURE EXCAVATION;
                              PERCENTAGE FOR PRELIMINARIES; PRESS RUN AND / OR PRINT TO OBTAIN YOUR CONSTRUCTION COST</p>                                                      
                          </div>                              
                      </div>   
                  </div>
                  <div class="col-md-3">
                      <div class="row">
                          <div class="col-xs-12 col-sm-12 col-md-12">
                              <span class="btn btn-success form-control">DESIGN CONCEPT IMAGE</span>
                          </div>
                      </div>
                      <div class="row">
                          <div class="col-xs-12 col-sm-12 col-md-12">
                              <textarea class="form-control" rows="10"></textarea>
                          </div> 
                      </div>
                      <div class="row">
                          <div class="col-xs-12 col-sm-12 col-md-12">
                              <div class="form-group">
                                  <strong>Conceptual Details Notes:</strong>
                                  <textarea class="form-control" rows="10" name="project_title"></textarea>          
                              </div>
                          </div>
                      </div>
                  </div>
              </div>          
          </div>
          <div class="row mt-5">
              <div class="col-xs-12 col-sm-12 col-md-12">
                  <table class="table table-striped table-bordered" style="background: aliceblue;">
                      <thead>
                          <tr>
                              <th width="13%">ELEMENT CODE</th>
                              <th width="18%">ELEMENT DESCRIPTION</th>
                              <th width="13%">COST / M2 GFA</th>
                              <th width="10%">UNIT / M2</th>
                              <th width="13%">COST/SF GFA</th>
                              <th width="10%">UNIT/SF</th>
                              <th width="13%">ELEMENT COST</th>
                              <th width="10%">FACTOR %</th>
                          </tr>
                      </thead>
                      <tbody>
                        <tr v-for="element in elements" :key="element.id">
                          <td>{{element.element_code}}</td>
                          <td>{{element.description}}</td>
                          <td>{{element.cost_m2|currency}}</td>
                          <td>{{element.unit_m2}}</td>
                          <td>{{element.cost_sf|currency}}</td>
                          <td>{{element.unit_sf}}</td>
                          <td>{{element.element_cost|currency}}</td>
                          <td>{{element.factor}}</td>
                        </tr>
                        <tr>
                          <td colspan="6"><b>Total:</b></td>
                          <td colspan="2">{{total|currency}}</td>
                        </tr>
                      </tbody>
                  </table>
              </div>
              <div class="col-xs-12 col-sm-12 col-md-12">
                  <table class="table table-bordered text-white">                    
                      <tbody>
                          <tr>
                              <td width="70%">
                                  <strong>MAIN CONTRACTORS PRELIMINARIES</strong>
                              </td>
                              <td width="10%">
                                  <input type="number" class="form-control" v-model="per_main_preliminary" @change="clearSummary">
                              </td>
                              <td width="5%"><strong>%</strong></td>
                              <td width="15%">
                                  <input class="form-control" v-model="main_preliminary" disabled>
                              </td>
                          </tr>
                          <tr>
                              <td>
                                  <strong>MAIN CONTRACTOR'S OVERHEADS & PROFIT</strong>
                              </td>
                              <td>
                                  <input type="number" class="form-control" v-model="per_main_profit" @change="clearSummary">
                              </td>
                              <td><strong>%</strong></td>
                              <td>
                                  <input class="form-control" v-model="main_profit" disabled>
                              </td>
                          </tr>
                          <tr>
                              <td colspan="3">
                                  <strong>TOTAL CONSTRUCTION COST - Contract Sum ( Excluding Contengencies and Contractor's Design Fees)</strong>
                              </td>                            
                              <td>
                                  <input class="form-control" v-model="contract_sum" disabled>
                              </td>
                          </tr>
                          <tr>
                              <td>
                                  <strong>PROJECT / DESIGN TEAM FEES</strong>
                              </td>
                              <td>
                                  <input type="number" class="form-control" v-model="per_team_fee" @change="clearSummary">
                              </td>
                              <td><strong>%</strong></td>
                              <td>
                                  <input class="form-control" v-model="team_fee" disabled>
                              </td>
                          </tr>
                          <tr>
                              <td>
                                  <strong>OTHER DEVELOPMENT COST</strong>
                              </td>
                              <td>
                                  <input type="number" class="form-control" v-model="per_dev_cost" @change="clearSummary">
                              </td>
                              <td><strong>%</strong></td>
                              <td>
                                  <input class="form-control" v-model="dev_cost" disabled>
                              </td>
                          </tr>
                          <tr>
                              <td>
                                  <strong>CONTENGENCIES (Client's Risk)</strong>
                              </td>
                              <td>
                                  <input type="number" class="form-control" v-model="per_client_risk" @change="clearSummary">
                              </td>
                              <td><strong>%</strong></td>
                              <td>
                                  <input class="form-control" v-model="client_risk" disabled>
                              </td>
                          </tr>
                          <tr>
                              <td colspan="3">
                                  <strong>TOTAL PROJECT COST</strong>
                              </td>                           
                              <td>
                                  <input class="form-control" v-model="project_cost" disabled>
                              </td>
                          </tr>
                          <tr>
                            <td colspan="4">
                              <span @click="calculate" class="btn btn-success">CALCULATE</span>       
                            </td>
                          </tr>
                      </tbody>
                  </table>
              </div>
          </div>
          <div class="row">
              <div class="col-md-3">                                         
                  <div class="form-group">
                      <strong>Basis of Estimate Notes:</strong>
                      <textarea class="form-control" rows="10" name="project_title"></textarea>          
                  </div>                         
              </div>
              <div class="col-md-3">                                         
                  <div class="form-group">
                      <strong>Inclustions & Exclustions Notes:</strong>
                      <textarea class="form-control" rows="10" name="project_title"></textarea>          
                  </div>                         
              </div>
          </div>
      </div>  
  </div>
  </div>
</template>
<script>

export default{
    mounted(){
        console.log('Estimation Form 1 Component');
    },
    created(){
      this.getResults();
    },
    data(){
      return{
          quantity_sq_ft:0,
          project_title:'',
          category:'',
          country:'',
          elements:{},
          loading:true,
          total:0,
          main_preliminary:0,
          per_main_preliminary:0,
          per_main_profit:0,
          main_profit:0,
          contract_sum:0,
          team_fee:0,
          per_team_fee:0,
          dev_cost:0,
          per_dev_cost:0,
          client_risk:0,
          per_client_risk:0,
          project_cost:0,
      }
    },
    methods:{
      getResults(){
        var _this = this  
        _this.$Progress.start() 
        _this.loading = true                         
        axios.get('/cost-estimate/form-1/getResults?quantity_sq_ft='+_this.quantity_sq_ft+'&category='+_this.category)
        .then(function(response){              
                _this.elements = response.data.data.elements
                _this.total = response.data.data.total
                _this.$Progress.finish()  
                _this.loading = false  
            }); 
      },
      clearSummary(){
        var _this = this 
        _this.main_preliminary = 0
        _this.main_profit = 0
        _this.contract_sum = 0
        _this.team_fee = 0
        _this.dev_cost = 0
        _this.client_risk = 0
        _this.project_cost = 0
      },
      calculate(){
        var _this = this 
        _this.main_preliminary = (_this.total*_this.per_main_preliminary)/100
        _this.main_profit = (_this.total *_this.per_main_profit)/100
        _this.contract_sum = _this.total + _this.main_preliminary + _this.main_profit
        _this.team_fee = (_this.contract_sum) * _this.per_team_fee /100
        _this.dev_cost = (_this.contract_sum) * _this.per_dev_cost /100
        _this.client_risk = (_this.contract_sum) * _this.per_client_risk /100
        _this.project_cost = _this.contract_sum+_this.team_fee+_this.dev_cost+_this.client_risk        
      }
    }
    
}
</script>