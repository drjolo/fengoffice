<?php
header('Content-Type: text/xml');
echo "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n"; ?>
<definitions name="SoapInterop" targetNamespace="http://soapinterop.org/main2/" 
		xmlns:wsdlns="http://soapinterop.org/main2/"  
		xmlns:impns="http://soapinterop.org/definitions/"  
		xmlns:soap="http://schemas.xmlsoap.org/wsdl/soap/" 		
		xmlns:typens2="http://soapinterop.org/xsd2" 		
		xmlns:typens="http://soapinterop.org/xsd"
		xmlns="http://schemas.xmlsoap.org/wsdl/">
	
	<import namespace = "http://soapinterop.org/xsd" location = "import2.wsdl.php"/>
	<import namespace = "http://soapinterop.org/definitions/" location = "import2.wsdl.php"/>
	
	<types>
	<schema targetNamespace='http://soapinterop.org/xsd2'
	      xmlns='http://www.w3.org/2001/XMLSchema'  
	      xmlns:SOAP-ENC='http://schemas.xmlsoap.org/soap/encoding/'      
	      xmlns:wsdl = "http://schemas.xmlsoap.org/wsdl/"		    
	      elementFormDefault='unqualified'>
	      <import namespace = "http://schemas.xmlsoap.org/soap/encoding/"/>
	      <import namespace = "http://soapinterop.org/xsd"/>	
	      <complexType  name ='ArrayOfSOAPStruct'>
	        <complexContent>
        	  <restriction base='SOAP-ENC:Array'>
            		<attribute ref='SOAP-ENC:arrayType' wsdl:arrayType='typens:SOAPStruct[]'/>
	          </restriction>
        	</complexContent>
	      </complexType>
	</schema>
	</types>

	<message name='Server.echoStructArray'>
    		<part name='inputArray' type='typens2:ArrayOfSOAPStruct'/>
  	</message>
  	<message name='Server.echoStructArrayResponse'>
    		<part name='Result' type='typens2:ArrayOfSOAPStruct'/>
  	</message>

	<portType name="SoapInteropImport3PortType">
		<operation name='echoStruct' parameterOrder='inputStruct'>
    			  <input message='impns:Server.echoStruct' />
      			  <output message='impns:Server.echoStructResponse' />
		</operation>
		<operation name='echoStructArray' parameterOrder='inputArray'>
    			  <input message='wsdlns:Server.echoStructArray' />
      			  <output message='wsdlns:Server.echoStructArrayResponse' />
		</operation>
	</portType>	

	<binding name="SoapInteropImport3Binding" type="wsdlns:SoapInteropImport3PortType">
		<soap:binding style="rpc" transport="http://schemas.xmlsoap.org/soap/http"/>
		<operation name="echoStruct">
			<soap:operation soapAction="http://soapinterop.org/"/>
			<input>
				<soap:body use="encoded" namespace="http://soapinterop/" encodingStyle="http://schemas.xmlsoap.org/soap/encoding/"/>
			</input>
			<output>
				<soap:body use="encoded" namespace="http://soapinterop/" encodingStyle="http://schemas.xmlsoap.org/soap/encoding/"/>
			</output>
		</operation>
		<operation name="echoStructArray">
			<soap:operation soapAction="http://soapinterop.org/"/>
			<input>
				<soap:body use="encoded" namespace="http://soapinterop/" encodingStyle="http://schemas.xmlsoap.org/soap/encoding/"/>
			</input>
			<output>
				<soap:body use="encoded" namespace="http://soapinterop/" encodingStyle="http://schemas.xmlsoap.org/soap/encoding/"/>
			</output>
		</operation>
	</binding>
	<service name="Import3">
		<port name="SoapInteropImport3Port" binding="wsdlns:SoapInteropImport3Binding">
			<soap:address location="http://<?php echo $_SERVER["SERVER_NAME"].':'.$_SERVER["SERVER_PORT"];?>/soap_interop/server_Round3GroupDImport3.php"/>
		</port>
	</service>
</definitions>
