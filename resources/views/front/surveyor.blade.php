@extends('front.layouts.app')


@section('title', $dep['title'])

@section('body')
<div class="single-page sidebar-right">
    <div class="article-wrap bkwrapper container" itemscope itemtype="http://schema.org/Article">
        <div class="article-content-wrap">
            <div class="row bksection bk-in-single-page clearfix">
                <div class="main col-md-8">
                    <div class="page-title">
                        <h2 class="heading"><span>{{ $dep['title'] }}</span></h2>
                        <div class="bk-breadcrumbs-wrap">
                            <div class="breadcrumbs">
                                <span itemscope itemtype="http://data-vocabulary.org/Breadcrumb">
                                    <a itemprop="url" href="{{ url('/') }}"><span itemprop="title">{{ trans('front.home') }}</span></a>
                                </span>
                                <span class="delim">&rsaquo;</span>
                                <span class="current">{{ trans('front.Category') }} : &quot;{{ $dep['name'] }}&quot;</span>
                            </div>
                        </div>
                    </div>  
                    <div class="row">  
                        <table width="100%" align="center" border="0" cellpadding="2" cellspacing="2">     
                          <tr bgcolor="#666666" style="color:#FFF; font-weight:bold">    
                            <td align="center">#</td>
                            <td align="right">الاسم</td>
                            <td align="center">رقم الجوال</td>
                            <td align="center">رقم الرخصة</td>
                            <!-- <td align="center">سنة الانتهاء</td> -->
                          </tr>
                        @foreach($db_all as $i=>$row)
                          <tr >    
                            <td width="5%"  align="center">{{ $i+1 }}</td>
                            <td width="45%"  align="right">{{ $row->name }}</td>
                            <td width="35%"  align="center">{{ $row->mobile }}</td>
                            <td width="15%"  align="center">{{ $row->doc_id }}</td>
                            <!-- <td width="15%"  align="center" >{{ $row->date_finish }}</td> -->
                          </tr>
                          @endforeach                           
                        </table> 
                        <div class="col-md-12">
                          {{ $db_all->links() }}
                        </div>
                    </div>
                </div>
                <div class="sidebar col-md-4">
                    <aside class="sidebar-wrap stick" id="bk-single-sidebar">
                        @include('front.sidebar')
                    </aside>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
@endsection
