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
                        <table width="100%" dir="ltr" align="center" border="0" cellpadding="2" cellspacing="2">     
                          <tr bgcolor="#666666" style="color:#FFF; font-weight:bold">    
                            <td align="center">تاريخ المعاملة</td>
                            <td align="center">اسم الناقل</td>
                            <td align="center">اسم المنقول اليه</td>
                            <td align="center">رقم المعاملة</td>
                            <td align="center">#</td>
                          </tr>
                        @foreach($db_all as $i=>$row)
                          <tr >    
                            <td width="15%"  align="center" >{{ $row->app_date }}</td>
                            <td width="35%"  align="right">{{ $row->from_owner_name }}</td>
                            <td width="35%"  align="right">{{ $row->to_owner_name }}</td>
                            <td width="10%"  align="center">{{ $row->app_no }}</td>
                            <td width="5%"  align="center">{{ $row->rn }}</td>
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
